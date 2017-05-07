
<?php

/*
Which of the following does NOT help to protect against session hijacking and fixation
attacks?

A.
Rotate the session id on successful login and logout using session_regenerate_id()

B.
Use SSL and set the $secure cookie parameter to true .

C.
Set the session.use_only_cookies php.ini parameter to 1 .

D.
Protect against XSS vulnerabilities in the application.

E.
Set the session.cookie_lifetime php.ini parameter to 0 .

Answer: E.
Set the session.cookie_lifetime php.ini parameter to 0 .

*/
echo '118. Which of the following does NOT help to protect against session hijacking and fixation attacks?' . PHP_EOL;
echo 'Set the session.cookie_lifetime php.ini parameter to 0.' . PHP_EOL;