<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'owner_id' => ['required','integer'],
            'type' => ['required','string'],
            'address' => ['required','string'],
            'number' => ['required','string'],
            'rent' => ['required','integer'],
            'features' => ['required','string'],
            'status' => ['required','string'],
            'images' => ['nullable', 'array', 'max:5']
        ];
    }
}
