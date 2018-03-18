<?php

use App\Entity\Adverts\Category;
use App\Entity\Region;
use App\Http\Router\AdvertsPath;

if (! function_exists('adverts_path')) {

    function adverts_path(?Region $region, ?Category $category)
    {
        return app()->make(AdvertsPath::class)
            ->withRegion($region)
            ->withCategory($category);
    }
}