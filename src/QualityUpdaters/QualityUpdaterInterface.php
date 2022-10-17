<?php

namespace GildedRose\QualityUpdaters;

use GildedRose\Item;

interface QualityUpdaterInterface
{
    public function updateQuality(Item $item): void;
}
