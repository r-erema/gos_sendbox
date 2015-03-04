<tr>
	<td style="" bgcolor="#008185" height="6">

	</td>
</tr>
<tr>
	<td style="padding-top: 60px; padding-right: 50px; padding-bottom: 50px; padding-left: 50px;">
		<table cellpadding="0" cellspacing="0" border="0" style="font-family: Arial, Helvetica sans-serif; font-size: 10.5pt; color: #000000;">
			<tr>
				<td width="220" style="padding-right: 21px; padding-bottom: 34px; padding-left: 40px; background: url('http://profiz.ru/pictures/mailsub/common/2.0/shelf.png') center 277px no-repeat;" valign="top">
					<a href="http://www.profiz.ru/sec/<?php echo $data['params']['magNumber']; ?>_2015/<?php echo $this->googleStatUri; ?>" target="_blank" style="display: block; line-height: 1;">
						<img src="http://www.profiz.ru/pictures/cover/sec/m_<?php echo $data['params']['magNumber']; ?>_2015.jpg" style="border: 1px solid #e2e2e2;" alt=""/>
					</a>
				</td>
				<td valign="top" style="padding-left: 18px;">
					<p style="color: #008186; font-size: 18pt; line-height: 1.2; font-weight: bold; margin-top: 0; margin-bottom: 12px;">Вышел новый  номер журнала «СанЭпидемКонтроль»!</p>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Arial, Helvetica sans-serif; font-size: 10.5pt; color: #000000;">
						<tr>
							<td valign="top">
								<p style="font-size: 13.5pt; margin-top: 0; margin-bottom: 0;">№ <?php echo $data['params']['magNumber']; ?>, <?php echo date('Y'); ?> г.</p>
							</td>
							<td style="text-align: right; padding-top: 3px;" valign="top">
								<table cellpadding="0" cellspacing="0" border="0" align="right" style="font-family: Arial, Helvetica sans-serif; font-size: 10.5pt; color: #000000; text-align: left;">
									<tr>
										<td style="padding-top: 2px;">
											<a href="http://www.profiz.ru/sec/<?php echo $data['params']['magNumber']; ?>_2015/<?php echo $this->googleStatUri; ?>" target="_blank"><img src="http://profiz.ru/pictures/mailsub/common/2.0/icon__content_blue.png" alt="" width="18" height="11" border="0" /></a>
										</td>
										<td>
											<a href="http://www.profiz.ru/sec/<?php echo $data['params']['magNumber']; ?>_2015/<?php echo $this->googleStatUri; ?>" style="color: #265bac;" target="_blank">Содержание номера</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>

					<div style="border-bottom: 1px solid #e0e0e0; margin-bottom: 18px; margin-top: 20px;">&nbsp;</div>

					<p style="margin-top: 0; margin-bottom: 5px;"><a href="http://profiz.ru/sec/<?php echo $this->googleStatUri; ?>" style="color: #265bac;" target="_blank">Подробнее о журнале</a></p>
					<p style="margin-top: 0; margin-bottom: 0;">Подписаться на&nbsp;журнал можно по&nbsp;тел.<br /> (495) 258-08-15 или <a href="http://www.profiz.ru/subscribe/<?php echo $this->googleStatUri; ?>" style="color: #265bac;" target="_blank">на&nbsp;сайте</a></p>
				</td>
			</tr>
		</table>
		<?php foreach($data['content'] as $sectionName => $sectionContent): ?>
			<!-- separator section -->
			<div style="border-top: 1px solid #e0e0e0; margin-bottom: 30px; margin-top: 48px;">&nbsp;</div>
			<!-- title section -->
			<p style="color: #008185; font-size: 12pt; font-weight: bold; text-transform: uppercase; letter-spacing: 0.096em; margin-top: 0; margin-bottom: 30px;"><?php echo $sectionName; ?></p>
			<?php if(is_array($sectionContent)): ?>
				<?php foreach($sectionContent as $article): ?>
					<!-- article -->
					<!-- title -->
					<p style="font-size: 12pt; font-weight: bold; margin-top: 30px; margin-bottom: 7px;">
						<?php if($article['link'] !== null): ?><a href="<?php echo $article['link'].$this->googleStatUri; ?>" style="color: #265bac;" target="_blank"><?php endif; ?>
							<?php echo $article['title']; ?>
							<?php if($article['link'] !== null): ?></a><?php endif; ?>
					</p>
					<!-- author -->
					<p style="color: #939393; margin-top: 0; margin-bottom: 15px;"><?php echo $article['author']; ?></p>
					<!-- intro -->
					<?php if($article['text'] !== null): ?>
						<?php foreach($article['text'] as $paragraph): ?>
							<p style="margin-top: 0; margin-bottom: 20px;"><?php echo $paragraph; ?></p>
						<?php endforeach; ?>
					<?php endif; ?>
					<!-- /article -->

					<!-- separator article -->
					<table width="82" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 0; margin-top: 20px; font-size: 0;"><tr><td height="1" style="border-top: 2px solid #008185;">&nbsp;</td></tr></table>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</td>
</tr>