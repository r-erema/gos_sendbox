<meta charset="utf-8">
<?php
define('UNSUBSCRIBERS_LIST', 'D:\dev\server\domains\profiz\maillist\log\un-log.txt');
$unsubscribersFileContent = file_get_contents(UNSUBSCRIBERS_LIST);
$unEmails = [];
$unEmails = explode("\r\n", $unsubscribersFileContent);
if(isset($_POST['emails']) && !empty($_POST['emails']) && !empty($unEmails)):
	$emailsToCheck = explode("\r\n", $_POST['emails']);
	$correctEmails = array_diff($emailsToCheck, $unEmails);
	$unCheckedEmails = array_intersect($emailsToCheck, $unEmails);
?>
	<p>Исключено e-mail адресов: <strong><?php echo count($unCheckedEmails); ?></strong></p>
	<div style='color: red'>
		<?php foreach($unCheckedEmails as $unChEmail) {
			echo "$unChEmail<br>";
		} ?>
	</div><hr>
		<?php foreach($correctEmails as $email) {
			echo "$email<br>";
		} ?>
<?php else: ?>
	<form method="post" action="">
		<p><label for="emails">Вставтье e-mail адреса которые надо проверить:</label></p>
		<p><textarea id="emails" name="emails" rows="30" cols="100"></textarea><p>
		<p><input type="submit"></p>
	</form>
<?php endif; ?>