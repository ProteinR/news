<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class UpdateUserRequest extends StoreUserRequest
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
        return array_merge(parent::rules(), [
            'email' => [
                'required',
                Rule::unique('news')->ignore($this->user->id),
            ],
        ]);
    }
}
