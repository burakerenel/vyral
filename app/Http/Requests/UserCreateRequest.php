<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserCreateRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Hash::make($this->password)
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'twitter_username' => 'required|string|max:15', // Twitter username cannot be longer than 15 characters.
        ];
    }
}
