<?php

namespace App\Http\Requests\Admin\service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'services_provider' => ['required','string'],
            'name' => ['required','string'],
            'description' => ['required','string'],
            'value' => ['required'],
            'payment' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
