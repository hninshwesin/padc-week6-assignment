<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255|unique:posts,title',
            'content' => 'sometimes|required|string',
//            'author_id' => 'string',
            'is_published' => 'boolean',
            'category_id' => 'sometimes|required|exists:categories,id'
        ];
    }
}
