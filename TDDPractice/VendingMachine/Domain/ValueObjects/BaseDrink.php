<?php

namespace TDDPractice\VendingMachine\Domain\ValueObjects;

abstract class BaseDrink
{
    private $name;
    private $price;

    protected const DRINK_NAME = '';
    protected const DRINK_PRICE = 0;

    public function __construct()
    {
        $this->name = static::DRINK_NAME;
        $this->price = static::DRINK_PRICE;
    }

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return $this->price;
    }
}
