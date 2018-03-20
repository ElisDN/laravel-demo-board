<?php

namespace App\UseCases\Adverts;

use Illuminate\Contracts\Pagination\Paginator;

class SearchResult
{
    public $adverts;
    public $regionsCounts;
    public $categoriesCounts;

    public function __construct(Paginator $adverts, array $regionsCounts, array $categoriesCounts)
    {
        $this->adverts = $adverts;
        $this->regionsCounts = $regionsCounts;
        $this->categoriesCounts = $categoriesCounts;
    }
}
