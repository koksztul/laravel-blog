<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'premium' => 'boolean',
            'published' => 'boolean',
            'tags' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
