<?php

namespace App\Http\Requests\Admin\bill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreBillRequest extends FormRequest
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
            'discount'=>'required',
            'total_value'=>'numeric',
            'payment' => 'required',
            'user_id'=>'required',
            'doctor_id'=>'required',
        ];
    }
}
