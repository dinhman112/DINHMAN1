<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Category extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|min:6|unique:table_category,name_category'
        ];
    }
    public function messages()
    {
        return [
            'required'=> 'Ban can nhap :attribute nay',
            'min'=>'Ban can nhap it nhat :min ki tu',
            'unique'=> ':attribute da ton tai. Xin vui long them :attribute khac! ',
        ];
    }
}
