<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^\d+$/s',
        ];
    }
}

/**
 * @SWG\Definition(
 *     definition="ProfileEditRequest",
 *     type="object",
 *     @SWG\Property(property="name", type="string"),
 *     @SWG\Property(property="last_name", type="string"),
 *     @SWG\Property(property="phone", type="string"),
 * )
 */