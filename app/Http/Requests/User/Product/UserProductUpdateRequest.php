<?php

namespace App\Http\Requests\User\Product;

use Illuminate\Foundation\Http\FormRequest;

class UserProductUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|min:3|max:255',
            'description' => 'nullable|string|min:20|max:1000',
            'price' => 'nullable|numeric|min:0,01',
            'category_id' => 'nullable|integer|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.min' => 'Название должно содержать минимум 3 символа.',
            'title.max' => 'Название не должно превышать 255 символов.',
            'description.min' => 'Описание должно содержать минимум 20 символов.',
            'description.max' => 'Описание не должно превышать 1000 символов.',
            'price.numeric' => 'Цена должна быть числом.',
            'price.min' => 'Цена не может быть отрицательной.',
            'category_id.exists' => 'Выбранная категория не существует.',
        ];
    }
}
