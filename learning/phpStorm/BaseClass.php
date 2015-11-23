<?php

abstract class BaseClass
{
	public function methodOverride()
	{
	}

	abstract public function methodToImplement();

	public function methodOverride2($param1, $param2)
	{
	}

	abstract protected function methodToImplement2();

	static protected function methodToImplement3()
	{
	}


}