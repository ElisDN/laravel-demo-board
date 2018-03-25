<?php

namespace App\Entity\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property string $network
 * @property string $identity
 */
class Network extends Model
{
    protected $table = 'user_networks';

    protected $fillable = ['network', 'identity'];

    public $timestamps = false;
}
