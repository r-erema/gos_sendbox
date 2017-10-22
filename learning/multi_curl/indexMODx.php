<?php
/**
 * Плагин-костыль, который, при нажатии Управление->Очистить кэш,
 * в первую очередь обновляет модыксовый кэш самых важных страниц сайта,
 * пока не сделана нормальная система кэширования
 */
if ($modx->event->name == 'OnSiteRefresh') {
    $regenQuery = $modx->newQuery('modResource');
    $regenQuery->where(['id:IN' => [206, 224, 225]]);
    $regenQuery->select(array('id'));
    $regenQuery->sortby('id', 'DESC');
    $regenQuery->prepare()->execute();
    $resources = $regenQuery->stmt->fetchAll(PDO::FETCH_COLUMN);

    $multiCurl = curl_multi_init();
    foreach ($resources as $resource) {
        $url = $modx->makeUrl($resource, '', '', 'full');
        if (!empty($url)) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 0);
            curl_multi_add_handle($multiCurl, $curl);
        }
    }

    do {
        $mrc = curl_multi_exec($multiCurl, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);

    $startTime = time();
    while ($active && $mrc == CURLM_OK) {
        if (curl_multi_select($multiCurl) != -1) {
            do {
                $mrc = curl_multi_exec($multiCurl, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }
        while (($curl = curl_multi_info_read($multiCurl)) != false) {
            $info = curl_getinfo($curl['handle']);
            $modx->log(modX::LOG_LEVEL_INFO, "Page updated: {$info['url']}");
            curl_multi_remove_handle($multiCurl, $curl['handle']);
            curl_close($curl['handle']);
        }
    }
    curl_multi_close($multiCurl);
    $finishTime = time();

    $spentSeconds = $finishTime - $startTime;
    $modx->log(modX::LOG_LEVEL_INFO, "Spent seconds: {$spentSeconds}");

}