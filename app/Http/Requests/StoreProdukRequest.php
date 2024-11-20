<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdukRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'show_in_transaction' => 'required|boolean',
            'use_stock' => 'required|boolean',
            'stock' => 'required|integer|min:0',
            'code' => 'required|string|max:255',
            'basic_price' => 'required|integer|min:0',
            'selling_price' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'picture' => 'nullable|string|max:255',
        ];
    }
}
