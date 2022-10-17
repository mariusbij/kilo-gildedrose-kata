<?php

namespace GildedRose\QualityUpdaters;

use GildedRose\Item;

class Conjured implements QualityUpdaterInterface
{
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality == 0) {
            return;
        }

        $item->quality -= 2;

        if ($item->sell_in < 0) {
            $item->quality -= 2;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
