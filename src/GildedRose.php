<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\QualityUpdaters\QualityUpdaterFactory;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        $factory = new QualityUpdaterFactory();

        foreach ($this->items as $item) {
            $qualityUpdater = $factory->createQualityUpdater($item);
            $qualityUpdater->updateQuality($item);
        }
    }
}
