<?php

namespace Tests\Unit;

use GildedRose\QualityUpdaters\Conjured;
use PHPUnit\Framework\TestCase;
use GildedRose\Item;

class ConjuredTest extends TestCase
{
    public function testConjuredItemAfterOneDay(): void
    {
        $item = new Item('Conjured Mana Cake', 10, 40);
        $itemExpected1Day = new Item('Conjured Mana Cake', 9, 38);

        $updater = new Conjured();
        $updater->updateQuality($item);

        $this->assertEquals($itemExpected1Day, $item);
    }

    public function testConjuredItemAfterTenDays(): void
    {
        $item = new Item('Conjured Mana Cake', 10, 40);
        $itemExpected10Days = new Item('Conjured Mana Cake', 0, 20);

        $updater = new Conjured();

        for ($i = 0; $i < 10; $i++) {
            $updater->updateQuality($item);
        }

        $this->assertEquals($itemExpected10Days, $item);
    }

    public function testConjuredItemAfterTwelveDays(): void
    {
        $item = new Item('Conjured Mana Cake', 10, 40);
        $itemExpected12Days = new Item('Conjured Mana Cake', -2, 12);

        $updater = new Conjured();

        for ($i = 0; $i < 12; $i++) {
            $updater->updateQuality($item);
        }

        $this->assertEquals($itemExpected12Days, $item);
    }
}
