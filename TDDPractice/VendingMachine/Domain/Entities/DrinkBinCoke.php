<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkCoke;

class DrinkBinCoke extends BaseDrinkBin
{
    protected const STORABLE_DRINK_CLASS = DrinkCoke::class;
}
