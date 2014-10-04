<?php

trait A {

	public function smallTalk() {
		echo 'a';
	}

	public function bigTalk() {
		echo 'A';
	}
}

trait B {

	public function smallTalk() {
		echo 'b';
	}

	public function bigTalk() {
		echo 'B';
	}
}

class Talker {
	use A,B {
		B::smallTalk insteadof A;
		A::bigTalk insteadof B;
	}
}

class Aliased_Talker {
	use A,B {
		B::smallTalk insteadof A;
		A::bigTalk insteadof B;
		B::bigTalk as bTalk;
		A::smallTalk as sTalk;
	}
}

$talker = new Talker();
$talker->smallTalk();
$talker->bigTalk();

echo '<hr>';

$a_tlaker = new Aliased_Talker();
$a_tlaker->smallTalk();
$a_tlaker->bigTalk();
$a_tlaker->bTalk();
$a_tlaker->sTalk();