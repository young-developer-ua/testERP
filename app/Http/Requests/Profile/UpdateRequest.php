<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * UpdateRequest
 *
 * @property string $name
 * @property string $email
 * @property int $team_lead_id
 */
class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'string',
                Rule::unique(User::class, 'email')->ignore(auth()->user()->id)
            ],
            'team_lead_id' => [
                'nullable',
                Rule::exists(User::class, 'id')
            ]
        ];
    }
}
