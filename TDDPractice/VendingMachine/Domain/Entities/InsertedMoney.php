<?php

namespace TDDPractice\VendingMachine\Domain\Entities;

use TDDPractice\VendingMachine\Domain\ValueObjects\MoneyInterface;

class InsertedMoney
{
    /**
     * @var array $inserted
     */
    protected $inserted = [];

    public function insert(MoneyInterface $money)
    {
        $this->inserted[] = $money;
    }

    public function amount() : int
    {
        $amount = 0;
         /** @var MoneyInterface $m */
        foreach($this->inserted as $m) {
            $amount += $m->value();
        }

        return $amount;
    }
}
