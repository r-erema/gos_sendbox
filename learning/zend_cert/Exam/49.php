
<?php
/*
Your application uses PHP to accept and process file uploads. It fails to upload a file that is
5 MB in size, although upload_max_filesize is set to “10M”. Which of the following
configurations could be responsible for this outcome? (Choose 2)

A.
The PHP configuration option post_max_size is set to a value that is too small

B.
The web server is using an incorrect encoding as part of the HTTP response sent to the
client

C.
The browser uses an incorrect encoding as part of the HTTP request sent to the server

D.
The hidden form field MAX_FILE_SIZE was set to a value that is too small

E.
PHP cannot process file uploads larger than 4 MB

Answer: A, D
The PHP configuration option post_max_size is set to a value that is too small
The hidden form field MAX_FILE_SIZE was set to a value that is too small

*/

echo '49. Your application uses PHP to accept and process file uploads. It fails to upload a file that is
5 MB in size, although upload_max_filesize is set to “10M”. Which of the following
configurations could be responsible for this outcome? (Choose 2)' . PHP_EOL;
echo 'The PHP configuration option post_max_size is set to a value that is too small, The hidden form field MAX_FILE_SIZE was set to a value that is too small';