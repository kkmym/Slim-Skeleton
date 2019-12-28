<?php

namespace Tests\TDDPractice\Domain\DomainServices;

use TDDPractice\VendingMachine\Domain\DomainServices\CoinMechAcceptableMoney;
use TDDPractice\VendingMachine\Domain\ValueObjects\Bill1000Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Bill10000Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin10Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin1Yen;
use Tests\TestCase;

class CoinMechAcceptableMoneyTest extends TestCase
{
    public function testAcceptableMoney()
    {
        $coin1Yen = new Coin1Yen();
        $is1 = CoinMechAcceptableMoney::isAcceptable($coin1Yen);
        $this->assertFalse($is1);

        $coin10Yen = new Coin10Yen();
        $is10 = CoinMechAcceptableMoney::isAcceptable($coin10Yen);
        $this->assertTrue($is10);

        $bill1000Yen = new Bill1000Yen();
        $is1000 = CoinMechAcceptableMoney::isAcceptable($bill1000Yen);
        $this->assertTrue($is1000);

        $bill10000Yen = new Bill10000Yen();
        $is10000 = CoinMechAcceptableMoney::isAcceptable($bill10000Yen);
        $this->assertFalse($is10000);
    }
}
