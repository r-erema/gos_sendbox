<div style="border-top: 1px solid #e0e0e0; margin-bottom: 30px; margin-top: 48px;">&nbsp;</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: Arial, Helvetica sans-serif; font-size: 10.5pt;">
	<tr>
		<td valign="top">
			<a href="http://www.profiz.ru/stup/2_2015/" target="_blank" style="display: block; line-height: 1;">
				<!-- STUP COVER -->								<img src="http://www.profiz.ru/pictures/cover/stup/m_<?php echo $data['params']['magNumber']; ?>_2015.jpg" alt="Современные технологии управления персоналом" border="0" />
			</a>
		</td>
		<td valign="top" style="padding-left: 20px;">
			<p style="margin-top: 0; margin-bottom: 15px; color: #9e9e9e; font-size: 12pt; font-weight: bold; text-transform: uppercase; letter-spacing: 0.096em;">Тематические страницы</p>
			<p style="font-size: 18pt; font-weight: bold; line-height: 1.2; color: #c41c17; margin-top: 15px; margin-bottom: 30px;">«Современные технологии управления персоналом»</p>
			<p style="font-size: 13.5pt; margin-bottom: 15px;">№ <?php echo $data['params']['magNumber']; ?>, <?php echo date('Y'); ?> г.<br />
				<?php echo $this->parsed['super']['params']['signature']; ?></p>
			<?php /* <p style="margin-top: 15px;">Мы поговорили о жизненном цикле HR-а        и карьерных перспективах, пообщались         с бывшими HR-ми о том, чего им стоило вырваться из объятий профессии.</p> */ ?>
		</td>
	</tr>
</table>
<?php foreach($data['content'] as $sectionName => $sectionContent): ?>
	<!-- title section -->
	<p style="color: #c41c17; font-size: 12pt; font-weight: bold; text-transform: uppercase; letter-spacing: 0.096em; margin-top: 0; margin-bottom: 30px;"><?php echo $sectionName; ?></p>
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
		<table width="82" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 0; margin-top: 20px; font-size: 0;"><tr><td height="1" style="border-top: 2px solid #c41c17;">&nbsp;</td></tr></table>
	<?php endforeach; ?>
<?php endforeach; ?>
	</td>
</tr>