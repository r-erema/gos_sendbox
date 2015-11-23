<?php

	$requiredFields = [
		[
			'name' => 'first-number',
			'label' => 'первое число',
			'max-size' => 4
		],
		[
			'name' => 'second-number',
			'label' => 'второе число',
			'max-size' => 4
		]
	];

	$mathOperations = [
		[
			'name' => 'addition',
			'verb' => 'Сложить',
			'mark' => '+'
		],
		[
			'name' => 'subtraction',
			'verb' => 'Вычесть',
			'mark' => '-'
		],
		[
			'name' => 'multiplication',
			'verb' => 'Умножить',
			'mark' => '×'
		],
		[
			'name' => 'division',
			'verb' => 'Делить',
			'mark' => '÷'
		],
	];

	$errors = [];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		foreach ($requiredFields as $field) {
			if (!isset($_REQUEST[$field['name']]) || empty($_REQUEST[$field['name']])) {
				$errors[] = "Не введено {$field['label']}";
			} else {

			}
		}
	}
?>

<html>
<head>
	<title>PhpStorm</title>
	<style>
		.form {
			padding: 10px;
			border: 1px solid #a9a9a9;
			border-radius: 3px;
		}

		.form-field-row {
			margin: 10px;
		}
	</style>
</head>
<body>
	<?php if(count($errors)): ?>
	<div class="errors">
		<?php foreach($errors as $error): ?>
		<p><?php echo $error?></p>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<form class="form" method="post">
		<?php foreach ($requiredFields as $field) : ?>
			<div class="form-field-row">
				<label for="<?php echo $field['name']; ?>"><?php echo ucfirst($field['label']); ?> *:</label>
				<input name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" type="text" size="<?php echo $field['max-size']; ?>">
			</div>
		<?php endforeach; ?>
		<div class="form-field-row">
		<?php foreach ($mathOperations as $mathOperation) : ?>
			<input type="submit" name="<?php echo $mathOperation['name']; ?>" value="<?php echo $mathOperation['verb']; ?> ">
		<?php endforeach; ?>
		</div>
	</form>
</body>
</html>