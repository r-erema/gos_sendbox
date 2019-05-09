<?php
    $pdo = new PDO(
    'mysql:host=localhost;dbname=fg;charset=utf8',
    'root',
    'mmm_beer11',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);


    $stmt = $pdo->query('
        /*Новости*/
        SELECT *
        FROM  `modx_site_content`
        WHERE  `parent` = 20
        UNION
        /*Статьи*/
        SELECT *
        FROM  `modx_site_content`
        WHERE  `parent` = 4359
        UNION
        /*Исследования*/
        SELECT *
        FROM  `modx_site_content`
        WHERE  `parent` = 4777
    ');
    $publications = $stmt->fetchAll();
    $arr = [];
    $count = 0;
    foreach ($publications as $key => &$publication) {
        $publication['content'] = trim(str_replace('<p class="item-date">[[*publishedon:fdate=`d.m.Y`]]</p>', '', $publication['content']));

        switch ($publication['parent']) {
            case '20': //Новости
                $publication['parent'] = '254';
                $publication['content'] = trim(str_replace('[[++assets_url]]/images/pics', '[[++assets_url]]/pictures/publications/news', $publication['content']));
                $publication['uri'] = "pressroom/publications/news/{$publication['alias']}.html";
                break;
            case '4359': //Статьи
                $publication['parent'] = '255';
                $publication['content'] = trim(str_replace('[[++assets_url]]/images/pics', '[[++assets_url]]/pictures/publications/articles', $publication['content']));
                $publication['uri'] = "pressroom/publications/articles/{$publication['alias']}.html";
                break;
            case '4777': //Исследования
                $publication['parent'] = '256';
                $publication['content'] = trim(str_replace('[[++assets_url]]/images/pics', '[[++assets_url]]/pictures/publications/research', $publication['content']));
                $publication['uri'] = "pressroom/publications/research/{$publication['alias']}.html";
                break;
        }

        // Всё создал и опубликовал Рома Божков
        $publication['createdby'] = '4';
        $publication['publishedby'] = '4';


        $publication['template'] = '17';
        $stmt = $pdo->prepare('UPDATE modx_site_content SET
          `content` = :content,
          `parent` = :parent,
          `createdby` = :createdby,
          `publishedby` = :publishedby,
          `uri` = :uri,
          `template` = :template
          WHERE id = :id
        ');
        try {
            $executed = $stmt->execute([
                ':content' => $publication['content'],
                ':parent' => $publication['parent'],
                ':createdby' => $publication['createdby'],
                ':publishedby' => $publication['publishedby'],
                ':uri' => $publication['uri'],
                ':template' => $publication['template'],
                ':id' => $publication['id']
            ]);
            if ($executed) {
                $count++;
            }
        } catch (Exception $e) {
            $e = $e;
        }
    }

    $k = 1;
