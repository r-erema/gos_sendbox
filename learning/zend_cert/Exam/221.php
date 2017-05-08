
<?php

/*
An HTML form contains this form element: <input type="image" name="myImage"
src="image.png" /> The user clicks on the image to submit the form. How can you now
access the relative coordinates of the mouse click?

A.
$_FILES['myImage']['x'] and $_FILES['myImage']['y']

B.
$_POST['myImage']['x'] and $_POST['myImage']['y']

C.
$_POST['myImage.x'] and $_POST['myImage.y']

D.
$_POST['myImage_x'] and $_POST['myImage_y']

Answer: D.
$_POST['myImage_x'] and $_POST['myImage_y']

*/
echo '221. An HTML form contains this form element: <input type="image" name="myImage"
src="image.png" /> The user clicks on the image to submit the form. How can you now
access the relative coordinates of the mouse click?' . PHP_EOL;
echo '$_POST[\'myImage_x\'] and $_POST[\'myImage_y\']' . PHP_EOL;