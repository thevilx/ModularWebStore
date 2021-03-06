<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'status' => 'in:active,review,draft',
            'special' => 'boolean',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'exists:categories,id',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
