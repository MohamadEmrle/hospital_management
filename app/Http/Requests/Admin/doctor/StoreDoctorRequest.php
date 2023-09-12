<?php

namespace App\Http\Requests\Admin\doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated($key, $default),['type_id' => 3]);
    }
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
            'name_en' => ['required','string'],
            'name_ar' => ['required','string'],
            'phone' => ['required','numeric','unique:doctors,phone'],
            'photo' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
            'description_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'specoalty_id' => ['required']
        ];
    }
}
