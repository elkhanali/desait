<?php

namespace App\Http\Requests\WorkProcess;

use Illuminate\Foundation\Http\FormRequest;

class WorkProcessUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'proccess_title' => ['required', 'min:2', 'max:300'],
            'proccess_desc' => ['required', 'min:2', 'max:500'],
            'proccess_icon' => ['required', 'image', 'mimes:jpg,png,svg,webp',]
        ];
    }
}
