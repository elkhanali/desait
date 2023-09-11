<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesCreateRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:30'],
            'slug' => ['required', 'min:2', 'max:30'],
            'service_detail'=>['required', 'min:2', 'max:1000'],
            'service_header'=> ['required', 'min:2', 'max:1000'],
            'service_desc' => ['required', 'min:2', 'max:1000'],
            'service_image' => ['required', 'image', 'mimes:jpg,png,svg,webp'],
            'service_icon'=> ['required', 'image', 'mimes:jpg,png,svg,webp'],
        ];
    }
}
