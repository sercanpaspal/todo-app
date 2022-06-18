<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class TodoStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(["title" => "string", "description" => "string", "group_id" => "string[]"])]
    public function rules(): array
    {
        return [
            "title" => "required",
            "description" => "required",
            "group_id" => ["required", "int"]
        ];
    }
}
