<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:students,phone'],
            'password' => ['required'],
            'is_active' => ['required', 'boolean'],
            'branch_id' => ['required', 'exists:branches,id'],
            'image' => ['nullable', 'file:png,jpg,jpeg']
        ];
    }
}
