<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // 'name'=> 'required|min:6',
            'email'=> 'required|email',
            'password'=> 'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'required'=> 'Ban can nhap truong :attribute nay!',
            'min' => 'Ban can nhap truong :attribute nay du :min!',
            'email' => 'Ban can nhap dung dinh danh email!',
            // 'name' => 'Ban can nhap :attribute it nhat :min ki tu!',
        ];
    }
}
