<?php

namespace GildedRose\QualityUpdaters;

use GildedRose\Item;

class AgedBrie implements QualityUpdaterInterface
{
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality == 50) {
            return;
        }

        $item->quality++;

        if ($item->sell_in < 0) {
            $item->quality++;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }
}
