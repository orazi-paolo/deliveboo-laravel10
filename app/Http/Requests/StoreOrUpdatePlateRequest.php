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
         if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'restaurant_id'=>['required', 'numeric', 'integer', 'exists:restaurants,id'],
            'image'=>['nullable', 'image', 'max:255'],
            'name'=>['required', 'string', 'min:2', 'max:255', 'unique:plate,name'],
            'description'=>['required', 'string', 'min:20'],
            'ingredient_description'=>['required', 'string', 'min:20'],
            'price'=>['required', 'numeric', 'decimal:2,2'],
            'visible'=>['required', 'boolean'],
        ];
    }
}