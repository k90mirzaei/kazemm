<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ForgetEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['email' => "string"])] public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users'
        ];
    }
}
