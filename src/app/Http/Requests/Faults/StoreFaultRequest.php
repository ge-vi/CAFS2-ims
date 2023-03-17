<?php

namespace App\Http\Requests\Faults;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fault_name' => ['required', 'string'],
            'fault_description' => ['required', 'string', 'min:20'],
            'fault_inv' => ['nullable', 'string'],
            'owner_name' => ['required', 'string'],
            'owner_email' => ['required', 'email'],
            'owner_phone' => ['required', 'numeric'],
        ];
    }
}
