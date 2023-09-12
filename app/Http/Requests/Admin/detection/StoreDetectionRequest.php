<?php

namespace App\Http\Requests\Admin\detection;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetectionRequest extends FormRequest
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
            'specialty_id' => 'required',
            'doctor_id' => 'required',
            'price_id' => 'required',
            'date_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
