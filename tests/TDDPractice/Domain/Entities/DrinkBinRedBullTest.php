<?php

namespace Tests\TDDPractice\Domain\Entities;

use TDDPractice\VendingMachine\Domain\Entities\DrinkBinRedBull;
use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkRedBull;
use Tests\TestCase;

class DrinkBinRedBullTest extends TestCase
{
    public function testReplenishDrink()
    {
        $bin = new DrinkBinRedBull();
        $this->assertEquals(0, $bin->countStock());

        $bin->replenish(new DrinkRedBull());
        $this->assertEquals(1, $bin->countStock());
    }

    public function testRemoveDrink()
    {
        $bin = new DrinkBinRedBull();
        $bin->replenish(new DrinkRedBull());
        $bin->replenish(new DrinkRedBull());
        $this->assertEquals(2, $bin->countStock());

        $coke = $bin->pick();
        $this->assertInstanceOf(DrinkRedBull::class, $coke);
        $this->assertEquals(1, $bin->countStock());
    }
}
