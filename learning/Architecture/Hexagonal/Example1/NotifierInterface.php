<?php
namespace learning\Architecture\Hexagonal\Example1;

interface NotifierInterface
{

	public function notify(MessageInterface $message): bool;

}