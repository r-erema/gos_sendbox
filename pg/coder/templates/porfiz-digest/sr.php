<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Секретарь-референт</title>
	<style type="text/css">
		html, body {margin: 0; padding: 0; font: normal 10pt arial;}
	</style>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="145" ><img src="http://www.profiz.ru/pictures/cover/sr/m_<?php echo $this->parsed['sr']['params']['month']; ?>_2014.jpg" alt="" width="118" height="164" /></td>
		<td width="612">
			<h4>Здравствуйте, %[n]%.</h4>
			<h2 style="color:#365f91">Вышел новый номер<br />журнала «Секретарь-референт»!<img src="http://ru.commontools.net/bs/banner/DfVL70/jgUUq0/?nobody=1" alt="Рассылка анонса" style="width: 1px; height: 1px;" border="0" /><img src="http://www.google-analytics.com/collect?v=1&tid=UA-1992459-1&cid=%[1]%&t=event&ec=email&ea=open&el=secretarinfo" /></h2>
			<br />
			<h3 style="color:#943634"><i><?php echo $this->parsed['sr']['params']['signature']; ?></i></h3>
		</td>
		<td width="260" valign="top" align="right">
			<p><small>Подробно о журнале: <a href="http://profiz.ru/sr/?utm_source=secretarinfo&utm_medium=email&utm_campaign=monthly-announce-december">«Секретарь-референт»!
					</a></small></p>
			<p><small>Подписаться на журнал можно<br />по тел. (495) 258-08-15 <br />или <a href="http://profiz.ru/subscribe/?utm_source=secretarinfo&utm_medium=email&utm_campaign=monthly-announce-december">на сайте</a></small></p>
		</td>
	</tr>
</table>

<?php foreach($this->parsed['sr']['content'] as $rubricName => $rubricArticles): ?>
	<h3 style="margin:1.7em 0;"><?php echo $rubricName; ?></h3>
	<?php if($rubricArticles !== null): ?>
		<?php foreach($rubricArticles as $article): ?>
			<b><?php echo $article['author']; ?></b>
			<h2 style="margin:0.15em 0 0 0;color:#365f91">
				<?php if($article['link'] !== null):?>
					<a href="<?php echo $article['link']?>" style="color:#365f91">
				<?php endif; ?>
				<?php echo $article['title']; ?>
				<?php if($article['link'] !== null): ?>
					</a>
				<?php endif; ?>
			</h2>
			<?php if($article['text'] !== null): ?>
				<?php foreach($article['text'] as $paragraph): ?>
					<p style="font:11pt Arial;margin:0.4em 0 0 1.7em;color:#666;"><?php echo $paragraph; ?></p>
				<?php endforeach; ?>
			<?php endif; ?>
			<p style="font:11pt Arial;margin:0.4em 0 0 1.7em;color:#666;">&nbsp;</p>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endforeach; ?>

</body>
</html>