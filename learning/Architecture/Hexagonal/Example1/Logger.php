<?php
namespace learning\Architecture\Hexagonal\Example1;

class Logger
{

	public function log(string $message): bool
	{
		return mb_strlen($message) !== false;
	}

}