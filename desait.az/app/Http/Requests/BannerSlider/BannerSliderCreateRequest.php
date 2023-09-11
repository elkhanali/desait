<?php

namespace App\Http\Requests\BannerSlider;

use Illuminate\Foundation\Http\FormRequest;

class BannerSliderCreateRequest extends FormRequest
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
            'title'=>['required', 'min:2','max:300'],
            'desc' =>['required', 'min:2','max:500'],
            // 'slug'=> ['required', 'min:2','max:30'],
            'image'=>['required','image','mimes:jpg,png,svg,webp',]
        ];
    }
}
