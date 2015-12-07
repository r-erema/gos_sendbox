<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;

class TextNotifier extends Notifier {
	public function inform($message) {
		print "Текстовое сообщение: $message";
	}
}