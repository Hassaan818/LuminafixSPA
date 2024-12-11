<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewAddRequest extends FormRequest
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
            'project_name' => ['required', 'string'],
            'project_summary' => ['required', 'string'],
            'project_review' => ['required', 'string'],
            'feedback' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'client_name' => ['required', 'string'],
            'status' => ['required']
        ];
    }
}
