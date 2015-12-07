<?php

namespace learning\patterns\patterns\composition_and_inheritance\classes\wright;


class RegistrationManager {

	public function register(Lesson $lesson) {
		$notifier = Notifier::getNotifier();
		$notifier->inform("Новое занятие: стоимость - {$lesson->cost()}");
	}
}