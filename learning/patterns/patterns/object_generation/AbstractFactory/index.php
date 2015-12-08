<?php
    spl_autoload_register(function ($class) {
        require_once "classes/$class.php";
    });

    $mgr = new BloggsCommsManager();
    $encoder = $mgr->getContactEncoder();
    echo $encoder->encode();