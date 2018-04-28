<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:5|max:190',
            'preview' => 'required|min:5',
            'body' => 'required|min:5',
            'cover' => 'sometimes|file|mimes:jpeg,bmp,png',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category is required',
            'category_id.integer' => 'The category is invalid',
            'category_id.exists' => 'The category is invalid',
        ];
    }
}
