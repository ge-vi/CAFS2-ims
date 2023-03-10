<?php

namespace App\Http\Requests\Owners;

use Illuminate\Foundation\Http\FormRequest;

class StoreOwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'min:9'],
        ];
    }
}
