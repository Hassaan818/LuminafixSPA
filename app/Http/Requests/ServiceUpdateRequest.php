<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'image' => ['sometimes','required','image','mimes:jpeg,jpg,png,gif'],
            'status' => ['required', 'numeric'],
            'category' => ['required', 'string'],
            'detail_page_heading' => ['required', 'string'],
            'detail_page_image' => ['sometimes','required','image','mimes:jpeg,jpg,png,gif'],
            'detail_page_description' => ['required', 'string'],
            'detail_page_strategy_heading' => ['required', 'string'],
            'detail_page_strategy_description' => ['required', 'string'],
        ];
    }
}
