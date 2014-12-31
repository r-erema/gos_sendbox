<!-- ANNOUNCEMENT ANALYTICS ARTICLES BLOCK START -->
<tr>
	<td style="padding-top: 15px; padding-bottom: 20px; padding-left: 40px; padding-right: 40px;" bgcolor="#ffffff">
		<h1 style="text-align: center; font-size: 30px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 10px;">Анонс аналитических материалов</h1>
		<h2 style="text-align: center; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 10px;">Читайте на следующей неделе</h2>
		<h2 style="text-align: center; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 35px;"><?php echo $this->period; ?></h2>
		<?php foreach($this->parsed['Читайте на следующей неделе'] as $profName => $articles): ?>
			<!-- FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> TITLE START -->
			<table class="digest-template-title" width="620" height="34" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td height="11" width="255"></td>
					<td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;"><?php echo $profName?></h3></td>
					<td width="255"></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#cccccc"><!-- line --></td>
					<td bgcolor="#cccccc"><!-- line --></td>
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
			<!-- FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> TITLE END -->
		<!-- FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> CONTENT START -->
			<table width="620" cellspacing="0" cellpadding="0" border="0">
				<?php foreach($articles as $article): ?>
				<tr>
					<td width="64" valign="top">
						<img src="http://normativka.by/pictures/video/authors/<?php echo $article['authors']['photo']; ?>" alt="" style="margin-top: 3px;" width="64" height="64" />
					</td>
					<td width="12">
						<!-- padding -->
					</td>
					<td width="544" valign="top">
						<p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;"><?php echo $article['title']; ?></p>
						<p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;"><?php echo $article['authors']['name']; ?></p>
					</td>
				</tr>
				<tr>
					<td colspan="3" height="15">
						<!-- padding -->
					</td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="3" height="10">
						<!-- padding -->
					</td>
				</tr>
			</table>
			<!-- FOR <?php if ($profName == 'Бухгалтеру'): ?>BUHGALTER<?php elseif ($profName == 'Кадровику'): ?>KADROVIK<?php elseif ($profName == 'Кадровику'): ?>JURISCONSULT<?php endif; ?> CONTENT END -->
		<?php endforeach; ?>