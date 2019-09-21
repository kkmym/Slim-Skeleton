<?php

namespace TDDPractice\VendingMachine\Domain\Types;

final class MoneyType
{
    private const COIN = 1;
    private const BILL = 2;

    /**
     * @var int $type
     */
    private $type;

    private function __construct(int $type)
    {
        $this->type = $type;
    }

    public static function coin() : self
    {
        return new self(self::COIN);
    }

    public function isCoin() : bool
    {
        return ($this->type == self::COIN);
    }

    public static function bill() : self
    {
        return new self(self::BILL);
    }

    public function isBill() : bool
    {
        return ($this->type == self::BILL);
    }
}
