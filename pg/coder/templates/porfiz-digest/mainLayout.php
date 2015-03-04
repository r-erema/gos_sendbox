<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>
			<center>
				<table width="700" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center" style="font-family: Arial, Helvetica sans-serif; font-size: 10.5pt; color: #000000;">
					<!-- HEADER BEGIN -->
					<?php require_once $this->currAddresseeForum."-header.php"; ?>
					<!-- HEADER END -->
					<tr>
						<td style="padding-top: 56px; padding-right: 50px; padding-bottom: 50px; padding-left: 50px;" valign="top">
							<p style="margin-top: 0; margin-bottom: 50px; font-size: 24pt; font-weight: bold;">
								Здравствуйте, %[n]%.
								<img src="http://www.google-analytics.com/collect?v=1&tid=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['google-id'] ?>&cid=%[1]%&t=event&ec=email&ea=open&el=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?>" />
							</p>
							<?php
							$i = 0;
							foreach($this->parsed as $context => $data) {
								$data['outputMagSeparator'] = ($i == 0) ? false : true; $i++;
								$templatePath = "templates/porfiz-digest/$context.php";
								file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
							}
							?>

					<tr>
						<td bgcolor="#f5f5f5" style="font-size: 9pt; color: #5d5d5d; padding-top: 45px; padding-right: 50px; padding-bottom: 45px; padding-left: 50px;">
							<p style="font-size: 10.5pt; font-weight: bold; margin-top: 0; margin-bottom: 15px;">&copy;&nbsp;ООО&nbsp;&laquo;Профессиональное издательство&raquo;</p>
								<?php
									$total = count($this->parsed);
									$counter = 0;
								?>
							<p style="margin-top: 3px; margin-bottom: 3px;">Подробно о журнал<?php echo $total > 1 ? 'ах' : 'е';?>
								<?php foreach($this->parsed as $context => $content): ?><?php $counter++; if($context != 'super'): ?><?php if($counter == 1): ?> <?php elseif($counter == $total): ?> и <?php else: ?>, <?php endif; ?>
<a href="http://www.profiz.ru/<?php echo $context; ?>/<?php echo $this->googleStatUri; ?>" style="color: #1c5ec2;" target="_blank">«<?php echo $this->magsParams[$context]['name']?>»</a><?php endif; ?><?php endforeach; ?>
							</p>
							<p style="margin-top: 3px; margin-bottom: 0;">Подписаться на журналы можно по тел. <b>(495) 258-08-15</b> или <a href="http://www.profiz.ru/subscribe/<?php echo $this->googleStatUri; ?>" style="color: #1c5ec2;" target="_blank">на сайте</a></p>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 45px; padding-right: 50px; padding-bottom: 45px; padding-left: 50px; color: #949494; font-size: 9pt; font-style: italic; text-align: center;">
							<p style="margin-top: 0; margin-bottom: 0;">Вы подписались на&nbsp;рассылку новостей журнала «<?php reset($this->parsed); echo $this->magsParams[key($this->parsed)]['name']; ?>»
								при&nbsp;регистрации на&nbsp;форуме
								<a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link'].$this->googleStatUri; ?>" style="color: #1c5ec2;" target="_blank"><?php echo $this->addrForumsParams[$this->currAddresseeForum]['name']; ?></a>.</p>
							<p style="margin-top: 0; margin-bottom: 0;">Рассылка отправлена на&nbsp;e-mail <a href="mailto:%[e]%" style="color: #1c5ec2;">%[e]%</a> в&nbsp;%[t]%.</p>
							<p style="margin-top: 0; margin-bottom: 0;">Вы можете <a href="<?php echo $this->addrForumsParams[$this->currAddresseeForum]['link']; ?>user/news-unsubscribe/?code=%[1]%" style="color: #1c5ec2;" target="_blank">отписаться</a> от&nbsp;этой рассылки.</p>
						</td>
					</tr>
				</table>
			</center>
		</td>
	</tr>
</table>
</body>
</html>