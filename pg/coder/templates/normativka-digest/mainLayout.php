<?php
	$templatePath = "templates/normativka-digest/analyticsAnnounce.php";
	file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
?>
<tr>
	<td height="6">
		<!-- padding -->
	</td>
</tr>

</table>
</center>
</td>
<!-- CONTAINER 1 END -->

</tr>
</table>
<!-- MAIN CONTAINER 1 END -->


<!-- MAIN CONTAINER 2 START -->
<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#dbe6ea" border="0" style="background: url('http://normativka.by/pictures/mailing/digest2.0/footer-bg.png') repeat-x left bottom #dbe6ea; font-family: Arial, Helvetica, sans-serif;">
	<tr>

		<!-- CONTAINER 2 START -->
		<td>
			<center>
				<table width="700" cellspacing="0" cellpadding="0" border="0">
					<?php
						$templatePath = "templates/normativka-digest/regInfo.php";
						file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
					?>
					<tr>
						<td height="6">
							<!-- padding -->
						</td>
					</tr>
					<?php
						$templatePath = "templates/normativka-digest/analyticsArticles.php";
						file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
					?>
					<tr>
						<td height="6">
							<!-- padding -->
						</td>
					</tr>
					<?php
						$templatePath = "templates/normativka-digest/seminars.php";
						file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
					?>