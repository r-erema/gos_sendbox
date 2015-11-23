<?php
    function readParams($sourceFile) {
        $params = array();
        if(preg_match('/\.xml$/i', $sourceFile)) {
            //read xml...
        } else {
            //read txt...
        }
        return $params;
    }

    function writeParams($params, $sourceFile) {
        if(preg_match('/\.xml$/i', $sourceFile)) {
            //write xml...
        } else {
            //write txt...
        }
    }

    $file = "./param.txt";
    $arr['key1'] = 'val1';
    $arr['key2'] = 'val2';
    $arr['key3'] = 'val3';
    writeParams($arr, $file);
    $output = readParams($file);
    print_r($output);

    $test = ParamHandler::getInstance("./params.xml");
    $test->addParam("key1", "val1");
    $test->addParam("key2", "val2");
    $test->addParam("key3", "val3");
    $test->write();

    $test = ParamHandler::getInstance("./params.txt");
    $test->read();