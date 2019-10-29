<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkRedBull;

class DrinkBinRedBull extends BaseDrinkBin
{
    protected const STORABLE_DRINK_CLASS = DrinkRedBull::class;
}
