<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrUpdatePlateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','max:255'],
            'description' => ['nullable', 'string'],
            'ingredient_description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'image' => ['nullable', 'image', 'max:2048'],
            'visible' => ['boolean'],
        ];
    }

    /**
     * Get the custom error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'image.image' => 'The uploaded file must not exceed 2 MB in size (2048 kilobytes).',
            'name.required' => 'This field is required and must be a text input no longer than 255 characters.',
            'name.string' => 'The name must be a string type.',
            'name.max' => 'The name must be no longer than 255 charachters.',
            'price.required' => 'The price is a required field.',
            'price.numeric' => 'The price must be a number.',
            'price.regex' => 'The price field is a number with up to 6 digits before the decimal point. And up to 2 digits after the decimal point.',
        ];
    }
}