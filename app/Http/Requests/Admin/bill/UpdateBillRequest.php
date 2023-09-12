<?php

namespace App\Http\Requests\Admin\bill;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBillRequest extends FormRequest
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
            'description'=>'required',
            'discount'=>'required',
            'amount_paid'=>'required|numeric',
            'amount_remainder'=>'required|numeric',
            'total_value'=>'required|numeric',
            'payment' => 'required',
            'user_id'=>'required',
            'doctor_id'=>'required',
        ];
    }
}
