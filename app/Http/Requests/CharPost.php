<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharPost extends FormRequest
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
            'chat.name' => 'required|string|max:50',
            'chat.icon' => 'required|numeric|between:0,5',
            'chat.chat_txt' => 'required|string|max:1000'
        ];
    }
}
