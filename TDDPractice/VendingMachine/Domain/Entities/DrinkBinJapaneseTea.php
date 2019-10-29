<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkJapaneseTea;

class DrinkBinJapaneseTea extends BaseDrinkBin
{
    protected const STORABLE_DRINK_CLASS = DrinkJapaneseTea::class;
}
