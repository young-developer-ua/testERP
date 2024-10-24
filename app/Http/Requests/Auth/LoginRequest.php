<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * LoginRequest
 *
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'string',
            ],
            'password' => [
                'required',
                'min:6',
                'max:255',
            ]
        ];
    }
}
