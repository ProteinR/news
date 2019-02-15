<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|unique:news|max:255',
            'text'        => 'required',
            'tags'        => 'required|exists:tags,id|min:1',
        ];
    }
}
