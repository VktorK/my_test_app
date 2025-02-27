<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:100',
            'last_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|same:re_password',
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'email'=> $this->email,
            'password' => Hash::make($this->password),
        ]);
    }
}
