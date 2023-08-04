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
            'fault_description' => ['required', 'string', 'min:15'],
            'fault_inv' => ['nullable', 'string'],
            'owner_name' => ['required', 'string'],
            'owner_email' => ['required', 'email'],
            'owner_phone' => ['required', 'numeric'],
        ];
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'fault_name' => __('Fault name'),
            'fault_description' => __('Broken item fault description'),
            'fault_inv' => __('Item INV number'),
            'owner_name' => __('Your name'),
            'owner_email' => __('Your email'),
            'owner_phone' => __('Your phone (only numbers)'),
        ];
    }
}
