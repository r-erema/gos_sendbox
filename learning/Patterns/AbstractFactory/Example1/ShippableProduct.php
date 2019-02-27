<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example1;

class ShippableProduct implements ProductInterface
{

	private $productPrice, $shippingCost;

	public function __construct(float $productPrice, float $shippingCost)
	{
		$this->productPrice = $productPrice;
		$this->shippingCost = $shippingCost;
	}

	public function calculatePrice(): float
	{
		return $this->productPrice + $this->shippingCost;
	}

}