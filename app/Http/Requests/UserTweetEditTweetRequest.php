<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTweetEditTweetRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'tweet_data' => json_encode($this->tweet_data),
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
            'tweet_data' => 'required|json',
            'status' => 'required|in:declined,published',
        ];
    }
}
