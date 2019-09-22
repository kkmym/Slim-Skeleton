<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\BaseDrink;

abstract class BaseDrinkBin
{
    protected $drinks = [];

    private $storableDrinkClass;
    protected const STORABLE_DRINK_CLASS = '';

    public function __construct()
    {
        $this->storableDrinkClass = static::STORABLE_DRINK_CLASS;
    }

    public function replenish(BaseDrink $drink)
    {
        if (!($drink instanceof $this->storableDrinkClass)) {
            throw new \Exception('not storable.');
        }

        $this->drinks[] = $drink;
    }

    public function pick()
    {
        if ($this->countStock() == 0) {
            throw new \Exception('cannot pick.');
        }

        $drink = array_shift($this->drinks);
        return $drink;
    }

    public function countStock()
    {
        return count($this->drinks);
    }
}
