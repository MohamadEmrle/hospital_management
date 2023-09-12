<?php

namespace App\Http\Requests\Admin\doctor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name_en' => ['string'],
            'name_ar' => ['string'],
            'phone' => ['required','numeric'],
            'photo' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
            'description_en' => ['string'],
            'description_ar' => ['string']
        ];
    }
}
