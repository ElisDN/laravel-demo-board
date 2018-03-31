<?php

namespace App\Entity\Adverts\Advert\Dialog;

use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

/**
 * $property int $id
 * $property Carbon $created_at
 * $property Carbon $updated_at
 * $property int $user_id
 * $property string $message
 */
class Message extends Model
{
    protected $table = 'advert_dialog_messages';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
