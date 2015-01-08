<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="145" ><img src="http://www.profiz.ru/pictures/cover/stup/m_<?php echo $this->parsed['super']['params']['month']; ?>_2015.jpg" alt="" width="118" height="164" /></td>
		<td>
			<h2>ТЕМАТИЧЕСКИЕ СТРАНИЦЫ </h2>
			<h3>«СОВРЕМЕННЫЕ ТЕХНОЛОГИИ УПРАВЛЕНИЯ ПЕРСОНАЛОМ»</h3>
			<br />
			<h3 style="color:#943634"><strong><?php echo $this->parsed['super']['params']['signature']; ?></strong></h3>
		</td>
		<td width="160" valign="top" align="right">
			<p>&nbsp;</p></td>
	</tr>
</table>
<p style="font:11pt Arial;margin:0.4em 0 0 1.7em;color:#666;">&nbsp;</p>

<?php foreach($this->parsed['super']['content'] as $rubricName => $rubricArticles): ?>
	<h3 style="margin:1.7em 0;"><?php echo $rubricName; ?></h3>
	<?php if($rubricArticles !== null): ?>
		<?php foreach($rubricArticles as $article): ?>
			<b><?php echo $article['author']; ?></b>
			<h2 style="margin:0.15em 0 0 0;color:#943634">
				<?php if($article['link'] !== null):?>
				<a href="<?php echo $article['link']?>?utm_source=<?php echo $this->addrForumsParams[$this->currAddresseeForum]['name'] ?>&utm_medium=email&utm_campaign=monthly-announce-<?php echo $this->parsed[$context]['params']['google_stat_utm']; ?>" style="color:#365f91">
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