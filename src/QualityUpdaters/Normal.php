<?php

namespace GildedRose\QualityUpdaters;

use GildedRose\Item;

class Normal implements QualityUpdaterInterface
{
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality == 0) {
            return;
        }

        $item->quality -= 1;

        if ($item->sell_in < 0) {
            $item->quality -= 1;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
