<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkFantaOrange;

class DrinkBinFantaOrange extends BaseDrinkBin
{
    protected const STORABLE_DRINK_CLASS = DrinkFantaOrange::class;
}
