<?php

namespace NS\NS {
    class ClassName {

        public function __construct() {
            echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
                'Class: ' . __CLASS__ . PHP_EOL .
                'Method: ' . __METHOD__ . PHP_EOL .
                'Namespace: ' . __NAMESPACE__ . PHP_EOL .
                str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
        }

    }
}

namespace NS {

    class ClassName {

        public function __construct() {
            echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
                'Class: ' . __CLASS__ . PHP_EOL .
                'Method: ' . __METHOD__ . PHP_EOL .
                'Namespace: ' . __NAMESPACE__ . PHP_EOL .
                str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
        }

    }

    new \NS\NS\ClassName();

}