<?php
    /*echo 'Привет <b>Вася</b>';*/
    var_dump(getallheaders());
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '?form-submitted=1');
    } else {
        if (array_key_exists('form-submitted', $_GET) && $_GET['form-submitted'] == 1) {
            echo 'form submitted';
        }
    }

?>

<form method="post">
    <label for="test">test field</label><input type="text" name="test" id="test">
    <input type="submit">
</form>
