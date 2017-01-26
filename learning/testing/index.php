<button onclick="alert('Clicked!')" id="click" >Click me</button>

<form method="post">
	<input type="text" name="text" id="text">
	<input type="submit" value="submit">
</form>

<?php
if (isset($_POST['text'])) {
	echo "<div style=\"margin: 20px;\">{$_POST['text']}</div>";
}