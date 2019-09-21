<?php

namespace Tests\TDDPractice\Domain\ValueObjects;

use TDDPractice\VendingMachine\Domain\Types\MoneyType;
use TDDPractice\VendingMachine\Domain\ValueObjects\Bill1000Yen;
use Tests\TestCase;

class Bill1000YenTest extends TestCase
{
    public function testInstance()
    {
        $bill1000yen = new Bill1000Yen();

        $this->assertEquals(1000, $bill1000yen->value());
        $this->assertEquals(MoneyType::bill(), $bill1000yen->type());
        $this->assertTrue($bill1000yen->type()->isBIll());
        $this->assertFalse($bill1000yen->type()->isCoin());
    }
}
