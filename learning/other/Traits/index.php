<meta charset="utf-8">
<h1>Трейты</h1>
<?php

trait ezcReflectionReturnInfo {
	function getReturnType() {}
	function getReturnDescription() {}
}

class ezcReflectionMethod extends ReflectionMethod {
	use ezcReflectionReturnInfo;
}

class ezcReflectionFunction extends ReflectionFunction {
	use ezcReflectionReturnInfo;
}