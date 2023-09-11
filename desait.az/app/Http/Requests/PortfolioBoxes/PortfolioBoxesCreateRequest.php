<?php

namespace App\Http\Requests\PortfolioBoxes;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioBoxesCreateRequest extends FormRequest
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
            'portfolio_boxes_category' => ['required', 'min:2', 'max:300'],
            'title' => ['required', 'min:2', 'max:500'],
            'image' => ['required', 'image', 'mimes:jpg,png,svg,webp'],
            'category_id' =>['required'],


            'header' => ['required', 'min:2', 'max:500'],
            'desc' => ['required', 'min:2', 'max:500'],
            'rows' => ['required', 'min:2', 'max:500'],
            'banner_image' =>['required', 'image', 'mimes:jpg,png,svg,webp'],
            'banner_header' => ['required', 'min:2', 'max:500'],
            'banner_desc' => ['required', 'min:2', 'max:500'],
            'banner_detail' => ['required', 'min:2', 'max:500'],



            
        ];
    }
}
