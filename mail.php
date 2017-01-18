<?php
require 'PHPMailer-master/PHPMailerAutoload.php';


$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->CharSet = 'utf-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nr-test-srv@commontools.net';                 // SMTP username
$mail->Password = 'gwJKd3ghlb';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'nr-test-srv@commontools.net';
$mail->FromName = 'Норматика.by';
$mail->addAddress('eratut@mail.ru');     // Add a recipient
//$mail->addAddress('nurettin@a.com');               // Name is optional
//$mail->addReplyTo('satis@yandex.com.tr', 'aaa sitesii');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'konu başlıgı';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}