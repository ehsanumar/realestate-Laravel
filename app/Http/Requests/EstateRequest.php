<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends FormRequest
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
            'city' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'description' => ['required', 'max:500', 'min:3'],
            'location' => ['required'],
            'bathroom' => ['required', 'numeric'],
            'bedroom' => ['required', 'numeric'],
            'kitchen' => ['required', 'numeric'],
            'garage' => ['required', 'numeric'],
            'floor' => ['required', 'numeric'],
            'area' => ['required' ,'numeric'],
            'amount' => ['required', 'numeric'],
            'images.*' => ['image'],
        ];
    }
}
