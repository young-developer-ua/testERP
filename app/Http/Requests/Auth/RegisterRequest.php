<?php

namespace App\Http\Requests\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * RegisterRequest
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property int $team_lead_id
 */
class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'string',
                Rule::unique(User::class, 'email')
            ],
            'password' => [
                'required',
                'min:6',
                'max:255',
                'required_with:passwordConfirmation',
                'same:passwordConfirmation'
            ],
            'passwordConfirmation' => [
                'required',
                'min:6',
            ],
            'role_id' => [
                'required',
                Rule::exists(Role::class, 'id'),
            ],
            'team_lead_id' => [
                'nullable',
                Rule::exists(User::class, 'id')
            ]
        ];
    }
}
