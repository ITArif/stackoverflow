<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StripThenLength implements Rule
{
    //akhane length ta pass korbo
    public $length;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($length)//$length ta upore global veriable krsi
    {
        $this->length=$length;
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
        $data=strip_tags($value);
        return strlen($data)>$this->length;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be more then 6 character';
    }
}
