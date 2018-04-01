<?php

namespace App\Listeners\Advert;

use App\Events\Advert\ModerationPassed;
use App\Notifications\Advert\ModerationPassedNotification;
use App\Services\Search\AdvertIndexer;

class ModerationPassedListener
{
    private $indexer;

    public function __construct(AdvertIndexer $indexer)
    {
        $this->indexer = $indexer;
    }

    public function handle(ModerationPassed $event): void
    {
        $advert = $event->advert;
        $this->indexer->index($advert);
        $advert->user->notify(new ModerationPassedNotification($advert));
    }
}
