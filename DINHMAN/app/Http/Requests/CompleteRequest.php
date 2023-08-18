<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteRequest extends FormRequest
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
          'name'=>'required|min:6',
          'email'=> 'required|email',
          'address'=>'required|min:30',
          'phone' => 'required|digits:10',
        ];
    }
    public function messages()
    {
        return [
          'min'=>'Bạn cần nhập ít nhất :min kí tự!',
          'required'=>'Bạn cần nhập :attribute này!',
          'email'=> 'Bạn cần nhập đúng định dạng :mail này!',
          'phone'=> "Bạn cần nhập đúng số điện thoại và đủ 10 kí tự số!"
        ];
    }
}
