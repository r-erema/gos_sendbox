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
		<?php if($counter == 1): ?>
			<a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
		<?php elseif($counter == $total): ?>
			и <a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
		<?php else: ?>
			, <a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
		<?php endif; ?>
	<?php endif; ?>
<?php endforeach; ?>
	<br />
	Подписаться на журналы можно по тел. <big><b>(495) 258-08-15</b></big> или на <a href="http://profiz.ru/subscribe/">сайте</a><br />
	© ООО «Профессиональное издательство»</p>


<p align="center"><font color="#666666"><strong>Вы подписались на рассылку новостей журнал<?php if(count($this->parsed) > 1):?>ов<?php else: ?>а<?php endif; ?>
<?php
	$total = count($this->parsed);
	$counter = 0;
	foreach($this->parsed as $context => $data): ?>
		<?php $counter++;  if($context != 'super'): ?>
			<?php
			//если 1ый элемент
			if($counter == 1):
				?>
				<a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
			<?php
			//если последний элемент
			elseif($counter == $total):
				?>
				и <a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
			<?php
			//если все остальные
			else:
				?>
				, <a href="<?php echo $this->magsParams[$context]['link'];?>">«<?php echo $this->magsParams[$context]['name'];?>»</a>
			<?php endif; ?>
		<?php endif; ?>
<?php endforeach; ?> при регистрации на форуме <a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link'] ?>"><?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?></a>.</strong><br>
		Рассылка отправлена на e-mail %[e]% в %[t]% для %[n]%.<br>
		Вы можете <a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link'] ?>/user/news-unsubscribe/?code=%[1]%">отписаться</a> от этой рассылки.</font></p>