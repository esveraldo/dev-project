<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'You need to enter your email.',
            'email.email' => 'You need to enter a valid email.',
            'email.exists' => 'No users found with this email.',
        ];
    }
}
