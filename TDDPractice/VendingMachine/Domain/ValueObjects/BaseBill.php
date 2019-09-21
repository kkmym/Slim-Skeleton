<?php

namespace TDDPractice\VendingMachine\Domain\ValueObjects;

use TDDPractice\VendingMachine\Domain\Types\MoneyType;

abstract class BaseBill implements MoneyInterface
{
    /**
     * @var MoneyType $type
     */
    private $type;

    /**
     * @value int $value
     */
    private $value;

    protected const VALUE = 0;

    public function __construct()
    {
        $this->type = MoneyType::bill();
        $this->value = static::VALUE;
    }

    public function type(): MoneyType
    {
        return $this->type;
    }

    public function value(): int
    {
        return $this->value;
    }
}
