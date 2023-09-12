<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\IranPhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name_en' => ['required','string'],
            'name_ar' => ['required','string'],
            'email' => ['required','email','unique:users'],
            'profile' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'phone' => ['nullable','unique:users'],
            'birthDate' =>['required'],
            'address' => ['required'],
            'question' => ['required']
        ];
    }
}
