<?php

namespace App\Http\Requests\Admin\offer;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'name_en' => ['required','string'],
            'name_ar' => ['required','string'],
            'description_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'photo' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'status' => ['required'],
        ];
    }
}
