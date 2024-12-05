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
}