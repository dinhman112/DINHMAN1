<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=> 'required| min:6|unique:productmaigrate,name_product',
            'price'=> 'required|integer',
            'img'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'accessories'=> 'required',
            'promotion'=> 'required|min:6',
            'condition'=> 'required',
            'description'=> 'required| min:50',
        ];
    }
    public function messages()
    {
        return [
            'min' => 'Bạn phải nhập ít nhất :min trong trường :attribute này!',
            'integer' => 'Bạn phải nhập đúng kiểu dữ liệu :integer trong trường :attrubute này!',
            'img'=> "Bạn phải thêm file :image vào trong trường :attribute này! ",
            'required'=> "Bạn phải nhập đầy đủ trường :attribute này!",
            'unique'=>':attribute product này đã tồn tài. Vui lòng nhập :attribute product khác!',
        ];
    }
}
