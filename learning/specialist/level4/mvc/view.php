<?php
	include 'controller.php';
?>

<html>
	<head>
		<title>view</title>
	</head>
	<body>
		<h1><?php echo $output; ?></h1>
		<table border="1">
			<tr>
				<th>id</th>
				<th>name</th>
				<th>age</th>
			</tr>
		<?php foreach($dbResult as $item): ?>
			<tr>
				<?php foreach($item as $property): ?>
					<td><?php echo $property; ?></td>
				<?php endforeach; ?>
			<tr>
		<?php endforeach; var_dump(get_include_path());?>
		</table>
	</body>
</html>