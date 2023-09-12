<?php

namespace App\Http\Requests\Admin\date;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateRequest extends FormRequest
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
            'for_hour' => ['required'],
            'to_hour' => ['required'],
            'day' => ['required'],
            'doctor_id' => ['required'],
        ];
    }
}