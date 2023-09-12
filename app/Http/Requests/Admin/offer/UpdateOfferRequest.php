<?php

namespace App\Http\Requests\Admin\offer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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
            'description_en' => ['string'],
            'description_ar' => ['string'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'status' => ['required'],
        ];
    }
}
