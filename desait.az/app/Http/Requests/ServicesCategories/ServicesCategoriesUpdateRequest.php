<?php

namespace App\Http\Requests\ServicesCategories;

use Illuminate\Foundation\Http\FormRequest;

class ServicesCategoriesUpdateRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:300'],
            'slug' => ['required', 'min:2', 'max:500'],
            'desc' => ['required', 'min:2', 'max:500'],
            'service_id' => ['required'],
        ];
    }
}
