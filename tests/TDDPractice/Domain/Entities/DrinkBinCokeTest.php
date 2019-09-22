<?php

namespace Tests\TDDPractice\Domain\Entities;

use TDDPractice\VendingMachine\Domain\Entities\BaseDrinkBin;
use TDDPractice\VendingMachine\Domain\Entities\DrinkBinCoke;
use TDDPractice\VendingMachine\Domain\ValueObjects\DrinkCoke;
use Tests\TestCase;

class DrinkBinCokeTest extends TestCase
{
    public function testReplenishDrink()
    {
        $bin = new DrinkBinCoke();
        $this->assertEquals(0, $bin->countStock());

        $bin->replenish(new DrinkCoke());
        $this->assertEquals(1, $bin->countStock());
    }

    public function testRemoveDrink()
    {
        $bin = new DrinkBinCoke();
        $bin->replenish(new DrinkCoke());
        $bin->replenish(new DrinkCoke());
        $this->assertEquals(2, $bin->countStock());

        $coke = $bin->pick();
        $this->assertInstanceOf(DrinkCoke::class, $coke);
        $this->assertEquals(1, $bin->countStock());
    }
}
