<?php

namespace Tests\TDDPractice\Domain\ValueObjects;

use Tests\TestCase;
use TDDPractice\VendingMachine\Domain\ValueObjects\BaseDrink;
use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkFantaOrange;

class DrinkFantaOrangeTest extends TestCase
{
    public function testInstance()
    {
        $fantaOrange = new DrinkFantaOrange();

        $this->assertEquals(130, $fantaOrange->price());
        $this->assertEquals('ファンタオレンジ', $fantaOrange->name());
        $this->assertInstanceOf(BaseDrink::class, $fantaOrange);
    }
}
