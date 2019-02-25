<?php

namespace learning\Architecture\Hexagonal\Example1;


class SesNotifier implements NotifierInterface
{

	public function notify(MessageInterface $message): bool
	{
		return is_array([
			'to' => $message->getTo(),
			'body' => $message->getBody(),
		]);
	}


}