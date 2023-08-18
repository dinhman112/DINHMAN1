<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientComent extends FormRequest
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
            'name'=> 'required| min:6',
            'email'=>'required|email',
            'comment'=>'required|min:15',
        ];
    }
    public function messages(){
        return [
            'min' => 'Bạn phải nhập ít nhất :min trong trường :attribute này!',
            'email'=> "Trường này bắt buộc nhập :attribute",
            'required'=> "Bạn phải nhập đầy đủ trường :attribute này!"
        ];
    }
}
