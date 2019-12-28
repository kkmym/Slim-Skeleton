<?php

namespace TDDPractice\VendingMachine\Domain\DomainServices;

use TDDPractice\VendingMachine\Domain\ValueObjects\Bill1000Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin100Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin500Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin50Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin10Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\MoneyInterface;

class CoinMechAcceptableMoney
{
    protected static $acceptables = [
        Coin10Yen::class
        ,Coin50Yen::class
        ,Coin100Yen::class
        ,Coin500Yen::class
        ,Bill1000Yen::class
   ];

    public static function isAcceptable(MoneyInterface $money)
    {
        $className = get_class($money);
        return in_array($className, static::$acceptables);
    }
}
