<?php

namespace GildedRose\QualityUpdaters;

use GildedRose\Item;

class QualityUpdaterFactory
{
    public function createQualityUpdater(Item $item): QualityUpdaterInterface
    {
        return match ($item->name) {
            'Aged Brie' => new AgedBrie(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePass(),
            'Sulfuras, Hand of Ragnaros' => new Sulfuras(),
            'Conjured Mana Cake' => new Conjured(),
            default => new Normal(),
        };
    }
}
