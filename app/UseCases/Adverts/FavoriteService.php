<?php

namespace App\UseCases\Adverts;

use App\Entity\Adverts\Advert\Advert;
use App\Entity\User\User;

class FavoriteService
{
    public function add($userId, $advertId): void
    {
        $user = $this->getUser($userId);
        $advert = $this->getAdvert($advertId);

        $user->addToFavorites($advert->id);
    }

    public function remove($userId, $advertId): void
    {
        $user = $this->getUser($userId);
        $advert = $this->getAdvert($advertId);

        $user->removeFromFavorites($advert->id);
    }

    private function getUser($userId): User
    {
        return User::findOrFail($userId);
    }

    private function getAdvert($advertId): Advert
    {
        return Advert::findOrFail($advertId);
    }
}
