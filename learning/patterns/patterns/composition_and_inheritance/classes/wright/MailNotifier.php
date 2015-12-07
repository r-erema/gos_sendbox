<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;

class MailNotifier extends Notifier {
	public function inform($message) {
		print "Уведомление по e-mail: $message";
	}
}