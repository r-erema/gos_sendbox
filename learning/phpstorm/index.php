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
	$result = null;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		foreach ($requiredFields as $field) {
			if (!isset($_REQUEST[$field['name']]) || $_REQUEST[$field['name']] === '') {
				$errors[] = "Не введено {$field['label']}";
			}
		}

		if (!count($errors)) {
			switch ($_POST['operation']) {
				case 'Сложить':
					$result = $_POST['first-number'] + $_POST['second-number'];
					break;
				case 'Вычесть':
					$result = $_POST['first-number'] - $_POST['second-number'];
					break;
				case 'Умножить':
					$result = $_POST['first-number'] * $_POST['second-number'];
					break;
				case 'Делить':
					$result = $_POST['first-number'] / $_POST['second-number'];
					break;
				default :
					throw new Exception('Unknown operation');
					break;
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

		ul.list {
			margin: 0;
		}

		ul.list li {
			list-style-type: none;
		}

		.errors {
			color: #740d11;
			padding: 10px;
			border: 1px solid #740d11;
			border-radius: 3px;
			margin: 10px 0;
		}

		.result {
			color: #007800;
			border: 1px solid #007800;
			border-radius: 3px;
			padding: 10px;
		}

	</style>
</head>
<body>
	<?php if(count($errors)): ?>
	<div class="errors">
		<ul class="list">
			<?php foreach($errors as $error): ?>
			<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<form class="form" method="post">
		<?php foreach ($requiredFields as $field) : ?>
			<div class="form-field-row">
				<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?> *:</label>
				<input name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" type="text" size="<?php echo $field['max-size']; ?>" value="<?php echo isset($_POST[$field['name']]) ? $_POST[$field['name']] : null; ?>">
			</div>
		<?php endforeach; ?>
		<div class="form-field-row">
		<?php foreach ($mathOperations as $mathOperation) : ?>
			<input type="submit" name="operation" value="<?php echo $mathOperation['verb']; ?>">
		<?php endforeach; ?>
		</div>
	</form>
	<?php if ($result):?>
		<div class="result">
			Результат: <?php echo $result; ?>
		</div>
	<?php endif ?>
</body>
</html>