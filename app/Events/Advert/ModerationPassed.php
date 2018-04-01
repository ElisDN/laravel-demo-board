<?php

namespace App\Events\Advert;

use App\Entity\Adverts\Advert\Advert;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ModerationPassed
{
    use Dispatchable, SerializesModels;

    public $advert;

    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }
}
