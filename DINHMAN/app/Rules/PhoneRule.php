<?php

namespace App\Rules;

use Attribute;
use Illuminate\Contracts\Validation\Rule;

class PhoneRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $attribute =null;
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $phone = 'regex:/^(080|091|090|070|081)+[0-9]{8}$/';
        if ($value == $phone) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // dd($this->attribute);
        return 'Bạn phải nhập đúng số điện thoại';
    }
}
