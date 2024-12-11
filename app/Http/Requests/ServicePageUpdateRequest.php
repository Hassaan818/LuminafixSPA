<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePageUpdateRequest extends FormRequest
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
            'page_title' => ['required', 'string'],
            'page_short_description' => ['required', 'string'],
            'page_description' => ['required', 'string'],
            'breadcrumb_short_description' => ['nullable', 'string'],
            'breadcrumb_description' => ['nullable', 'string'],
            'breadcrumb_heading' => ['nullable', 'string'],
        ];
    }
}
