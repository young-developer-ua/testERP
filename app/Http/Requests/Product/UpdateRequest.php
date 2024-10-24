<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * UpdateRequest
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property numeric $price
 */
class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => Rule::exists(Product::class, 'id'),
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'user_id' => [
                Rule::exists(User::class, 'id')
            ]
        ];
    }
}
