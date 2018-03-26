<?php

namespace App\Console\Commands\Api;

use App\Entity\Adverts\Advert\Advert;
use App\UseCases\Adverts\AdvertService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DocCommand extends Command
{
    protected $signature = 'api:doc';

    public function handle(): void
    {
        $swagger = base_path('vendor/bin/swagger');
        $source = app_path('Http');
        $target = public_path('docs/swagger.json');

        passthru('"' . PHP_BINARY . '"' . " \"{$swagger}\" \"{$source}\" --output \"{$target}\"");
    }
}
