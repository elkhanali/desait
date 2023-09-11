<?php

namespace App\Http\Requests\ChoseUs;

use Illuminate\Foundation\Http\FormRequest;

class ChoseUsUpdateRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpg,png,svg,webp',]
        ];
    }
}
