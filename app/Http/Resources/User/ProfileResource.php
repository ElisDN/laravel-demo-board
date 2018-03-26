<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property bool $phone_verified
 */
class ProfileResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => [
                'number' => $this->phone,
                'verified' => $this->phone_verified,
            ],
            'name' => [
                'first' => $this->name,
                'last' => $this->last_name,
            ],
        ];
    }
}

/**
 * @SWG\Definition(
 *     definition="Profile",
 *     type="object",
 *     @SWG\Property(property="id", type="integer"),
 *     @SWG\Property(property="email", type="string"),
 *     @SWG\Property(property="phone", type="object",
 *         @SWG\Property(property="number", type="string"),
 *         @SWG\Property(property="verified", type="boolean"),
 *     ),
 *     @SWG\Property(property="name", type="object",
 *         @SWG\Property(property="first", type="string"),
 *         @SWG\Property(property="last", type="string"),
 *     ),
 * )
 */