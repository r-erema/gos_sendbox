<?php
	$stack = new SplStack();
	$stack->push('First');
	$stack->push('Second');
	$stack->push('Third');
	$stack->push('Fourth');

	echo $stack->pop();
	echo $stack->bottom();

	echo $stack->pop();
	echo $stack->pop();
	echo $stack->pop();