<?php

namespace App\Providers;

use App\Events\Advert\ModerationPassed;
use App\Listeners\Advert\AdvertChangedListener;
use App\Listeners\Advert\ModerationPassedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModerationPassed::class => [
            AdvertChangedListener::class,
            ModerationPassedListener::class,
        ],
    ];
}
