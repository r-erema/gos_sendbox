<meta charset="UTF-8">
<?php
    require_once "classes/Digest/Digest_body.php";

    $text = null;
    if(isset($_POST['text']))
        $text = $_POST['text'];
    $digest = new Digest_body($text);
    $digest->smarty->display('body.tpl');
