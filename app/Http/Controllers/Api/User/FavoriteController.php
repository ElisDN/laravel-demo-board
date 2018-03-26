<?php

namespace App\Http\Controllers\Api\User;

use App\Entity\Adverts\Advert\Advert;
use App\Http\Controllers\Controller;
use App\Http\Resources\Adverts\AdvertDetailResource;
use App\UseCases\Adverts\FavoriteService;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function index()
    {
        $adverts = Advert::favoredByUser(Auth::user())->orderByDesc('id')->paginate(20);

        return AdvertDetailResource::collection($adverts);
    }

    public function remove(Advert $advert)
    {
        try {
            $this->service->remove(Auth::id(), $advert->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.favorites.index');
    }
}
