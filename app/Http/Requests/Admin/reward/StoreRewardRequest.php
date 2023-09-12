<?php

namespace App\Http\Requests\Admin\reward;

use Illuminate\Foundation\Http\FormRequest;

class StoreRewardRequest extends FormRequest
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
            'reward_points' => ['required','numeric'],
            'promotion_link' => ['required','url'],
            'user_id' =>['required'],
            'detection_id' =>['required'],
        ];
    }
}
