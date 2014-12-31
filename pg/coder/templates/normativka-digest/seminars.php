<!-- PROF.BY SEMINARS START-->
<!-- PROF.BY TITLE START -->
<tr>
	<td style="padding-top: 40px; padding-left: 40px; padding-right: 40px; padding-bottom: 10px;" bgcolor="#ffffff">
		<h1 style="text-align: center; font-size: 30px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 27px;">Семинары Prof.by</h1>

		<table class="digest-template-title" width="620" height="22" cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td height="11" width="210"></td>
				<td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Семинары на январь</h3></td>
				<td width="210"></td>
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
				<td height="20"></td>
				<td></td>
			</tr>
		</table>
		<!-- PROF.BY TITLE END -->

		<!-- PROF.BY CONTENT START -->
		<?php foreach($this->parsed['Семинары Prof.by'] as $seminar): ?>
			<div style="font-family: Arial, Helvetica, sans-serif; padding-top: 10px; margin-bottom: 20px;">
				<p style="color: #9fabaf; font-size: 13px; margin-bottom: 0; margin-top: 0;">
					<?php
						preg_match('#([0-9]+) ([а-я]+)#u', $seminar['date'], $matches);
					?><span style="font-size: 36px; font-weight: bold;"><?php echo $matches[1]; ?></span> <?php echo $matches[2]; ?></p>
				<p style="font-size: 13px; margin-top: 0; margin-bottom: 8px;"><strong><a href="<?php echo $seminar['link']; ?>/?utm_source=digest-<?php echo $this->digestNumber; ?>&utm_medium=email&utm_campaign=digest" style="color: #134c95;" target="_blank"><?php echo $seminar['title']; ?></a>:</strong></p>
				<?php foreach($seminar['text'] as $paragraph):?>
					<?php if(is_array($paragraph)): ?>
						<ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
							<?php foreach($paragraph as $markedParagraph): ?>
								<li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $markedParagraph; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php else: ?>
						<p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 3px;"><?php echo $paragraph; ?></p>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		<!-- PROF.BY CONTENT START -->
	</td>
</tr>
<!-- PROF.BY SEMINARS END-->