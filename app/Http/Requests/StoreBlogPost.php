<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        'name' => 'required|min:6|max:255',
        'email' => 'required|unique:users|',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Ten khong duoc bo trong',
            'name.min' => 'Ten phai tu 6 ki tu tro len',
            'email.required'  => 'Email khong duoc bo trong',
            'email.unique'  => 'da co ng su dung',
        ];
    }
}
