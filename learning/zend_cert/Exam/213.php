
<?php

/*
An HTML form contains this form element: <input type="file" name="myFile" /> When this
form is submitted, the following PHP code gets executed: move_uploaded_file(
$_FILES['myFile']['tmp_name'], 'uploads/' . $_FILES['myFile']['name'] ); Which of the
following actions must be taken before this code may go into production? (Choose 2)

A.
Check with is_uploaded_file() whether the uploaded file $_FILES['myFile']['tmp_name'] is 
valid

B.
Sanitize the file name in $_FILES['myFile']['name'] because this value is not consistent 
among web browsers

C.
Check the charset encoding of the HTTP request to see whether it matches the encoding 
of the uploaded file

D.
Sanitize the file name in $_FILES['myFile']['name'] because this value could be forged

E.
Use $HTTP_POST_FILES instead of $_FILES to maintain upwards compatibility

Answer: B,D.
Sanitize the file name in $_FILES['myFile']['name'] because this value is not consistent among web browsers, Sanitize the file name in $_FILES['myFile']['name'] because this value could be forged

*/
echo '213. An HTML form contains this form element: <input type="file" name="myFile" /> When this
form is submitted, the following PHP code gets executed: move_uploaded_file(
$_FILES[\'myFile\'][\'tmp_name\'], \'uploads/\' . $_FILES[\'myFile\'][\'name\'] ); Which of the
following actions must be taken before this code may go into production? (Choose 2)1' . PHP_EOL;

echo 'Sanitize the file name in $_FILES[\'myFile\'][\'name\'] because this value is not consistent among web browsers, Sanitize the file name in $_FILES[\'myFile\'][\'name\'] because this value could be forged';