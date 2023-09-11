<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
           'email'=>'string|required|email',
            'password'=>'string|required',
        ];
    }
}
