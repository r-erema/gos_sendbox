<?php

    function myAutoload($class) {
        require_once "../Classes/". str_replace('_', '/', $class) . ".php";
    }

    spl_autoload_register('myAutoload');

    //Загрузка существующей таблицы
    $inputFileName = 'test.xls';
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

    $book = new PHPExcel();
    $sheet = $book->getSheet();
    $book->createSheet();
    $count = $book->getSheetCount();

    $book->addSheet(new PHPExcel_Worksheet($book), 0);
    $count = $book->getSheetCount();

    $sheetCopy = clone $book->getSheet(2);
    $sheetCopy->setTitle('Copy');
    $book->addSheet($sheetCopy);
    $count = $book->getSheetCount();

    $book->removeSheetByIndex(2);
    $count = $book->getSheetCount();

    $f = 1;