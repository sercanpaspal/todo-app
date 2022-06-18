<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(["email" => "string[]", "password" => "string[]", "name" => "string[]"])]
    public function rules(): array
    {
        return [
            "email" => ["required", "unique:users", "email"],
            "password" => ["required", "confirmed"],
            "name" => ["required"]
        ];
    }
}
