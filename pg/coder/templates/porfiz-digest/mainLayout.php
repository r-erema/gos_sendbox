<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
		html, body {margin: 0; padding: 0; font: normal 10pt arial;}
	</style>
</head>
<body>
<img src="http://www.google-analytics.com/collect?v=1&tid=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['google-id'] ?>&cid=%[1]%&t=event&ec=email&ea=open&el=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?>" />
<?php
	foreach($this->parsed as $context => $data) {
		$templatePath = "templates/porfiz-digest/$context.php";
		file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
	}
?>

<p style="font:11pt Arial;margin-top:3em;">Подробно о журнал<?php if(count($this->parsed) > 1):?>ах<?php else: ?>е<?php endif; ?>:

<?php
$total = count($this->parsed);
$counter = 0;
foreach($this->parsed as $context => $data): ?>
		<?php $counter++; if($context != 'super'): ?>
		<?php if($counter == 1): ?> <?php elseif($counter == $total): ?>и <?php else: ?>, <?php endif; ?>
	<?php endif; ?>
	<a href="<?php echo $this->magsParams[$context]['link']; ?>/?utm_source=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?>&utm_medium=email&utm_campaign=monthly-announce-<?php echo $this->parsed[$context]['params']['google_stat_utm']; ?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
<?php endforeach; ?>
	<br />
	Подписаться на журналы можно по тел. <big><b>(495) 258-08-15</b></big> или на <a href="http://profiz.ru/subscribe/">сайте</a><br />
	© ООО «Профессиональное издательство»</p>


<p align="center"><font color="#666666"><strong>Вы подписались на рассылку новостей журнала «<?php echo $this->addrForumsParams[$this->currAddresseeForum]['subscribe-mag']; ?>» при регистрации на форуме <a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link'] ?>"><?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?></a>.</strong><br>
		Рассылка отправлена на e-mail %[e]% в %[t]% для %[n]%.<br>
		Вы можете <a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link'] ?>/user/news-unsubscribe/?code=%[1]%">отписаться</a> от этой рассылки.</font></p>
</body>
</html>