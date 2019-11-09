<?php

namespace Tests\TDDPractice\Domain\Entities;

use TDDPractice\VendingMachine\Domain\Entities\InsertedMoney;
use TDDPractice\VendingMachine\Domain\ValueObjects\Bill1000Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin10Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin50yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin100Yen;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin500Yen;

use Tests\TestCase;

class InsertedMoneyTest extends TestCase
{
    public function testInsertedMoney()
    {
        $insertedMoney = new InsertedMoney();

        $c100 = new Coin100Yen();
        $c10 = new Coin10Yen();
        $insertedMoney->insert($c100);
        for ($i=0; $i<5; $i++) {
            $insertedMoney->insert($c10);
        }

        $this->assertEquals(150, $insertedMoney->amount());
    }
}
