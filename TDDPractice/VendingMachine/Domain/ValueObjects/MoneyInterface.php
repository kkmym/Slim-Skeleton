<?php

namespace TDDPractice\VendingMachine\Domain\ValueObjects;

use TDDPractice\VendingMachine\Domain\Types\MoneyType;

interface MoneyInterface
{
    public function type() : MoneyType;
    public function value() : int;
}
