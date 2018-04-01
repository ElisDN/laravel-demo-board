<?php

namespace App\Listeners\Advert;

use App\Services\Search\AdvertIndexer;

class AdvertChangedListener
{
    private $indexer;

    public function __construct(AdvertIndexer $indexer)
    {
        $this->indexer = $indexer;
    }

    public function handle($event): void
    {
        $this->indexer->index($event->advert);
    }
}
