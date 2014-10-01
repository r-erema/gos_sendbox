<?php

$template_article = <<<DOC
<b>%s</b>
<h2 style="margin:0.15em 0 0 0;color:#365f91">%s</h2>
<p style="font:11pt Arial;margin:0.4em 0 0 1.7em;color:#666;">%s</p>
<p style="font:11pt Arial;margin:0.4em 0 0 1.7em;color:#666;">&nbsp;</p>


DOC;

$template_header = <<<DOC
<h3 style="margin:1.7em 0;">%s</h3>


DOC;

$template_link = <<<DOC
<a href="%s" style="color:#365f91">%s</a>
DOC;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Обработка российской рассылки</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

if (isset($_POST['data']))
{
	$data = $_POST['data'];
	
	$i = 0;
	$parts = array();
	foreach (explode("\n", $data) as $line)
	{
		$line = trim($line);
		
		if ($line === '')
		{
			continue;
		}
		
		if (strtoupper($line) === $line) // header
		{
			if ($i > 0)
			{
				print_article_block($parts);
				$parts = array();
				$i = 0;
			}
			printf($template_header, $line);
		}
		else if (substr($line, 0, 7) === 'http://') // link
		{
			$parts[count($parts) - 1] = sprintf($template_link, $line, $parts[count($parts) - 1]);
		}
		else if ($i < 3) // article block
		{
			$parts[] = htmlspecialchars($line);
			$i++;
		}
		
		if ($i == 3)
		{
			print_article_block($parts);
			$parts = array();
			$i = 0;
		}
	}

	if ($i > 0)
	{
		print_article_block($parts);
	}
}
else
{
	?>
	<form action="" method="POST">
	<textarea name="data" rows="40" cols="150"></textarea>
	<div style="height:20px;"></div>
	<input type="submit" value="Отправить" />
	</form>
	<?php
}

function print_article_block(array $parts)
{
	global $template_article;
	
	$c = count($parts);
	switch ($c)
	{
		case 0:
			return;
		case 1:
			$parts = array('#SPOOF#', $parts[0], '#SPOOF#');
			break;
		case 2:
			$parts = array('#SPOOF#', $parts[0], $parts[1]);
			break;
		default:
			$parts = array_splice($parts, 0, 3);
			break;
	}
	call_user_func_array('printf', array_merge(array($template_article), $parts));
}
?>

 </body>
 </html>