<?php
namespace learning\Architecture\Hexagonal\Example1;

interface MessageInterface
{
	public function getTo();
	public function getBody();
}