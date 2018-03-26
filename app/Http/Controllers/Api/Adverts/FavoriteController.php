<?php

namespace App\Http\Controllers\Api\Adverts;

use App\Entity\Adverts\Advert\Advert;
use App\Http\Controllers\Controller;
use App\UseCases\Adverts\FavoriteService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
    }

    public function add(Advert $advert)
    {
        $this->service->add(Auth::id(), $advert->id);
        return response()->json([], Response::HTTP_CREATED);
    }

    public function remove(Advert $advert)
    {
        $this->service->remove(Auth::id(), $advert->id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
