<?php


class ApplicationHelper {

    const OPTION_FILE_PATH = 'data/woo_options.xml';

    public function getOptions() {
        if (!file_exists(self::OPTION_FILE_PATH)) {
            throw new \woo\base\AppException('Файл с параметрами не найден');
        }


        $options = simplexml_load_file(self::OPTION_FILE_PATH);

        $dsn = (string) $options->dsn;
        // do something...
    }

}