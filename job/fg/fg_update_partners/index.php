<?php
    $pdo = new PDO(
    'mysql:host=localhost;dbname=fg_prod;charset=utf8',
    'root',
    'mmm_beer11',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

    try {
        $stmt = $pdo->query('
            /*Страны*/
            SELECT * FROM `modx_site_content` WHERE `parent` = 1692
        ');
        $countries = $stmt->fetchAll();
        foreach ($countries as &$country) {
            $stmt = $pdo->query("
                    /*Города*/
                    SELECT * FROM `modx_site_content` WHERE `parent` =  ${country['id']}
                ");
            $cities = $stmt->fetchAll();
            foreach ($cities as &$city) {
                $stmt = $pdo->query("
                        /*Партнёры*/
                        SELECT * FROM `modx_site_content`
                        WHERE `parent` =  ${city['id']}
                    ");
                $partners = $stmt->fetchAll();
                foreach ($partners as &$partner) {
                    /*4*/$partner['tvs']['partner_email'] = $pdo->query("SELECT `value` FROM `modx_site_tmplvar_contentvalues` WHERE contentid = ${partner['id']} AND tmplvarid = 4")->fetchColumn();
                    /*5*/$partner['tvs']['partner_site'] = $pdo->query("SELECT `value` FROM `modx_site_tmplvar_contentvalues` WHERE contentid = ${partner['id']} AND tmplvarid = 5")->fetchColumn();
                    /*8*/$partner['tvs']['partner_logo'] = $pdo->query("SELECT `value` FROM `modx_site_tmplvar_contentvalues` WHERE contentid = ${partner['id']} AND tmplvarid = 8")->fetchColumn();
                }
                $city['partners'] = $partners;
            }
            $country['cities'] = $cities;
        }
    } catch (Exception $e) {
        $e = $e;
    }

    $pdo = new PDO(
        'mysql:host=mysql.web;dbname=falcongaze-new;charset=utf8',
        'root',
        'neumen24Pos',
        [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
    );
    $pdo->beginTransaction();
    $withoutCoordinates = [];
    try {
        foreach ($countries as $country) {
            $countryToDB = $country;
            unset($countryToDB['id']);
            unset($countryToDB['cities']);
            $countryToDB['parent'] = 21;
            $countryToDB['template'] = 1;
            $sql = queryBuilder($countryToDB);
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array_values($countryToDB));
            $countryId = $pdo->lastInsertId();
            foreach ($country['cities'] as $city) {
                $cityToDB = $city;
                unset($cityToDB['id']);
                unset($cityToDB['partners']);
                $cityToDB['parent'] = $countryId;
                $cityToDB['template'] = 1;
                $sql = queryBuilder($cityToDB);
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array_values($cityToDB));
                $cityId = $pdo->lastInsertId();
                $yandexCoordinates = getCoordinates($country['pagetitle'], $city['pagetitle']);
                foreach ($city['partners'] as $partner) {
                    $partnerToDB = $partner;
                    unset($partnerToDB['id']);
                    unset($partnerToDB['tvs']);
                    $partnerToDB['parent'] = $cityId;
                    $partnerToDB['template'] = 37;
                    $sql = queryBuilder($partnerToDB);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array_values($partnerToDB));
                    $partnerId = $pdo->lastInsertId();
                    /*30 partner_phone*/
                    $phone = str_replace('[[%partner.fax?topic=`label`]]', 'Факс', $partner['introtext']);
                    $pdo->prepare("INSERT INTO `modx_site_tmplvar_contentvalues` (`tmplvarid`, `contentid`, `value`)
                              VALUES (30, {$partnerId}, {$pdo->quote($phone)});")
                        ->execute();
                    /*32 partner_yandex_coordinates*/
                    if ($yandexCoordinates) {
                        $pdo->prepare("INSERT INTO `modx_site_tmplvar_contentvalues` (`tmplvarid`, `contentid`, `value`) VALUES (32, {$partnerId}, {$pdo->quote($yandexCoordinates)});")->execute();
                    } else {
                        $withoutCoordinates[] = "{$country['pagetitle']},{$city['pagetitle']}";
                    }
                    /*34 partner_site_url*/
                    /*35 partner_logo*/
                    /*36 partner_email*/
                    foreach ($partner['tvs'] as $tvName => $tv) {
                        switch ($tvName) {
                            case 'partner_email':
                                $pdo->prepare("INSERT INTO `modx_site_tmplvar_contentvalues` (`tmplvarid`, `contentid`, `value`) VALUES (36, ${partnerId}, {$pdo->quote($tv)});")->execute();
                                break;
                            case 'partner_site':
                                $pdo->prepare("INSERT INTO `modx_site_tmplvar_contentvalues` (`tmplvarid`, `contentid`, `value`) VALUES (34, ${partnerId}, {$pdo->quote($tv)});")->execute();
                                break;
                            case 'partner_logo':
                                $tv = str_replace('images', 'pictures', $tv);
                                $pdo->prepare("INSERT INTO `modx_site_tmplvar_contentvalues` (`tmplvarid`, `contentid`, `value`) VALUES (35, ${partnerId}, {$pdo->quote($tv)});")->execute();
                                break;
                        }
                    }
                }
            }
        }
    } catch (Exception $e) {
        $pdo->rollBack();
    }
    $pdo->commit();
    file_put_contents('log.log', implode(PHP_EOL, $withoutCoordinates));

    function queryBuilder(array $dbArray)
    {
        $fields = array_keys($dbArray);
        $sql = 'INSERT INTO `modx_site_content` (' . implode(',', $fields). ') VALUES (' . rtrim(str_repeat('?,', count($fields)), ',') . ');';
        return $sql;
    }

/**
 * @param $country
 * @param $city
 * @return mixed|null
 */
    function getCoordinates($country, $city)
    {
        $points = json_decode(file_get_contents("https://geocode-maps.yandex.ru/1.x/?format=json&geocode=${country},${city}&key=AE4yIE4BAAAAZ2HAXQIAR0GJkUehqbfRtceEdHaUJXhrdRwAAAAAAAAAAADM7LNiUf5_ougdeCb6kFZLfw3kIQ=="), true)['response']['GeoObjectCollection']['featureMember'];
        foreach ($points as $point) {
            $point = $point['GeoObject'];
            if ($point['name'] === $city) {
                $ps = explode(' ', $point['Point']['pos']);
                return implode(',', [$ps[1], $ps[0]]);
            }
        }
        return null;
    }
