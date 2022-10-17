<?php

declare(strict_types=1);

namespace Tests\Feature;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testUpdateQualityAfterOneDay(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 5, 20)
        ];

        $expectedItemsDay1 = [
            new Item('+5 Dexterity Vest', 9, 19),
            new Item('Aged Brie', 1, 1),
            new Item('Elixir of the Mongoose', 4, 6),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 14, 21),
            new Item('Backstage passes to a TAFKAL80ETC concert', 9, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', 4, 50),
            new Item('Conjured Mana Cake', 4, 18)
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertEquals($expectedItemsDay1, $items);
    }

    public function testUpdateQualityThreeDays(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 5, 20)
        ];

        $expectedItemsDay3 = [
            new Item('+5 Dexterity Vest', 7, 17),
            new Item('Aged Brie', -1, 4),
            new Item('Elixir of the Mongoose', 2, 4),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 12, 23),
            new Item('Backstage passes to a TAFKAL80ETC concert', 7, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', 2, 50),
            new Item('Conjured Mana Cake', 2, 14)
        ];

        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < 3; $i++) {
            $gildedRose->updateQuality();
        }
        $this->assertEquals($expectedItemsDay3, $items);
    }

    public function testUpdateQualityFiveDays(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 5, 20)
        ];

        $expectedItemsDay5 = [
            new Item('+5 Dexterity Vest', 5, 15),
            new Item('Aged Brie', -3, 8),
            new Item('Elixir of the Mongoose', 0, 2),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 25),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', 0, 50),
            new Item('Conjured Mana Cake', 0, 10)
        ];

        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < 5; $i++) {
            $gildedRose->updateQuality();
        }
        $this->assertEquals($expectedItemsDay5, $items);
    }

    public function testUpdateQualityTenDays(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 5, 20)
        ];

        $expectedItemsDay10 = [
            new Item('+5 Dexterity Vest', 0, 10),
            new Item('Aged Brie', -8, 18),
            new Item('Elixir of the Mongoose', -5, 0),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 35),
            new Item('Backstage passes to a TAFKAL80ETC concert', 0, 50),
            new Item('Backstage passes to a TAFKAL80ETC concert', -5, 0),
            new Item('Conjured Mana Cake', -5, 0)
        ];

        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < 10; $i++) {
            $gildedRose->updateQuality();
        }
        $this->assertEquals($expectedItemsDay10, $items);
    }
}
