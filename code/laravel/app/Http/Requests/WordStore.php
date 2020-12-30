<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordStore extends FormRequest
{
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
            'English' => ['required', 'string', 'regex:/^([a-zA-Z])*$/'],
            'Japanese' => 'required|string',
        ];
    }
}
