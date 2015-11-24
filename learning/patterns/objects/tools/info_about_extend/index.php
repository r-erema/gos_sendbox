<?php
    require_once '../../basics/ShopProduct.php';
    require_once '../../basics/Chargeable.php';
    $shp = new ShopProduct('1','1','1','1');
    var_dump(class_implements($shp));