<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="145" ><img src="http://www.profiz.ru/pictures/cover/sec/m_<?php echo $this->parsed['sec']['params']['month']; ?>_2014.jpg" alt="" width="118" height="164" /></td>
		<td>
			<h2 style="color:#365f91">Вышел новый номер<br />журнала
				«Санэпидемконтроль»!</h2>
			<br />
			<h3 style="color:#943634"><i><?php echo $this->parsed['sec']['params']['signature']; ?></em></strong></i></h3></td>
		<td width="260" valign="top" align="right"><p><small>Подробно о журнале: <a href="http://www.profiz.ru/sec/">profiz.ru/sec/</a></small></p>
			<p><small>Подписаться на журнал можно<br />
					по тел. (495) 258-08-15 <br />
					или <a href="http://profiz.ru/subscribe/">на сайте</a></small></p></td>
	</tr>
</table>

<?php foreach($this->parsed['sec']['content'] as $rubricName => $rubricArticles): ?>
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