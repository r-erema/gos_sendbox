<!-- REGULATORY INFORMATION BLOCK START -->
<tr>
	<td style="padding-top: 40px; padding-left: 40px; padding-right: 40px;" bgcolor="#ffffff">
		<h1 style="text-align: center; font-size: 30px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 10px;">Нормативная правовая информация</h1>
		<h2 style="text-align: center; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 35px;">Последние изменения в законодательстве Республики Беларусь</h2>

<?php foreach($this->parsed['Нормативная правовая информация'] as $profName => $articles): ?>
	<!-- REGULATORY INFORMATION FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> TITLE START -->
	<table width="620" height="34" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td height="11" width="250"></td>
			<td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;"><?php echo $profName?></h3></td>
			<td width="250"></td>
		</tr>
		<tr>
			<td height="1" bgcolor="#cccccc">
				<!-- line -->
			</td>
			<td bgcolor="#cccccc">
				<!-- line -->
			</td>
		</tr>
		<tr>
			<td height="10"></td>
			<td></td>
		</tr>
		<tr>
			<td height="12" colspan="3">
				<!-- padding -->
			</td>
		</tr>
	</table>
	<!-- REGULATORY INFORMATION FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> TITLE END -->
		<!-- REGULATORY INFORMATION FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> CONTENT START -->
		<div style="margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
			<?php foreach($articles as $article): ?>
			<p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="<?php echo $article['link']; ?>?utm_source=digest-<?php echo $this->digestNumber; ?>&utm_medium=email&utm_campaign=digest" style="color: #134c95;" target="_blank"><?php echo $article['title']; ?></a></p>
			<?php foreach($article['text'] as $paragraph): ?>
				<?php if(is_array($paragraph)): ?>
					<ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
						<?php foreach($paragraph as $markedParagraph): ?>
						<li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $markedParagraph; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<p style="margin-top: 0; margin-bottom: 8px;"><?php echo $paragraph; ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
				<p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
			<?php endforeach; ?>
		</div>
		<!-- REGULATORY INFORMATION FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> CONTENT END -->
<?php endforeach; ?>