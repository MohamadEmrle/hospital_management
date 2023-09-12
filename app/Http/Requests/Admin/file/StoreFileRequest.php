<?php

namespace App\Http\Requests\Admin\file;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
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
            'name' => 'required|string|unique:files,name',
            'description' => 'required|string|unique:files,description',
            'file' => 'required|mimes:png,jpg,pdf,doc,docx',
            'file_type'=>'required',
            'detection_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
