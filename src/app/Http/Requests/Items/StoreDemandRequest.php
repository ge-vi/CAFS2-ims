<?php

namespace App\Http\Requests\Items;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandRequest extends FormRequest
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
            'item_name' => ['required', 'string'],
            'item_description' => ['required', 'string'],
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
            'item_name' => __('Item name'),
            'item_description' => __('Item description'),
            'owner_name' => __('Your name'),
            'owner_email' => __('Your email'),
            'owner_phone' => __('Your phone (only numbers)')
        ];
    }
}
