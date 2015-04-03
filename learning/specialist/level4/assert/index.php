<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: GutsOut
 * Date: 10.03.15
 * Time: 21:08
 */

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

function myAssertHandler($file, $line, $code, $desc) {
	echo "<hr />Проверка утверждения провалена: <br />
		Файл: $file <br />
		Строка: $line <br />
		Код: $code <br />
		Описание: $desc <br />
	";
}

assert_options(ASSERT_CALLBACK, 'myAssertHandler');

assert('2<1', '[bn-[bn');