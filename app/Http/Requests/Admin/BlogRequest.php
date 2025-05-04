<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name.en' => ['required', 'string'],
            'name.ar' => ['required', 'string'],
            'description.en' => ['nullable', 'string'],
            'description.ar' => ['nullable', 'string'],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'string'],
            'background' => ['nullable', 'string'],
        ];
    }
}

