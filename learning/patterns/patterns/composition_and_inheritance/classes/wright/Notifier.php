<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;


abstract class Notifier {
	static public function getNotifier() {
		//Создание конкретного класса согласно нормальной логике, а пока костыль...
		if (rand(1,2) == 1) {
			return new MailNotifier();
		} else {
			return new TextNotifier();
		}
	}
	abstract public function inform($message);
}