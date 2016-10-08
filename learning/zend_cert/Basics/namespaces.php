<?php
namespace my\full\nsname\sub {
	function ns() {return __NAMESPACE__;}
}
namespace foo {
	use my\full\nsname;
	echo nsname\sub;
}