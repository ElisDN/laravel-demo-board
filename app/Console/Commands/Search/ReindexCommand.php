<?php

namespace App\Console\Commands\Search;

use App\Entity\Adverts\Advert\Advert;
use App\Services\Search\AdvertIndexer;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
    protected $signature = 'search:reindex';

    private $indexer;

    public function __construct(AdvertIndexer $indexer)
    {
        parent::__construct();
        $this->indexer = $indexer;
    }
    
    public function handle(): bool
    {
        $this->indexer->clear();

        foreach (Advert::active()->orderBy('id')->cursor() as $advert) {
            $this->indexer->index($advert);
        }

        return true;
    }
}
