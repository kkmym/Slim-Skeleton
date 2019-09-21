<?php

namespace Tests\TDDPractice\Domain\ValueObjects;

use TDDPractice\VendingMachine\Domain\Types\MoneyType;
use TDDPractice\VendingMachine\Domain\ValueObjects\Coin100Yen;
use Tests\TestCase;

class Coin100YenTest extends TestCase
{
    public function testInstance()
    {
        $coin100yen = new Coin100Yen();

        $this->assertEquals(100, $coin100yen->value());
        $this->assertEquals(MoneyType::coin(), $coin100yen->type());
        $this->assertTrue($coin100yen->type()->isCoin());
        $this->assertFalse($coin100yen->type()->isBill());
    }
}
