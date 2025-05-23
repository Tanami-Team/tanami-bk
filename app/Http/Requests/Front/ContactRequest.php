<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'type'         => 'required|in:complaint,suggestion',
                'name'         => 'required|string|max:255',
                'phone'        => 'required|string|max:255',
                'email'        => 'required|email|max:255',
                'company_name' => 'nullable|string|max:255',
                'message'      => 'nullable|string',
        ];
    }
}
