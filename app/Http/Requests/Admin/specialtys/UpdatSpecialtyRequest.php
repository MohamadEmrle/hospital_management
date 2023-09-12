<?php

namespace App\Http\Requests\Admin\specialtys;

use Illuminate\Foundation\Http\FormRequest;

class UpdatSpecialtyRequest extends FormRequest
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
            'spename_en' => ['string'],
            'spename_ar' => ['string'],
        ];
    }
}
