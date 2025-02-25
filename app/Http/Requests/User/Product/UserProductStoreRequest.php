<?php

namespace App\Http\Requests\User\Product;

use Illuminate\Foundation\Http\FormRequest;

class UserProductStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'require|string|min:3',
            'description' => 'require|string|min:20',
            'price' => 'require|decimal',
            'category_id' => 'require|integer|exists:categories,id'
        ];
    }
}
