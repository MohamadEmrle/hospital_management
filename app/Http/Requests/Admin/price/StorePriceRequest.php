<?php

namespace App\Http\Requests\Admin\price;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest extends FormRequest
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
            'Profits_Dr' => 'required',
            'Profits_center' => 'required',
            'total_value' => 'required',
            'doctor_id' => 'required',
        ];
    }
}
