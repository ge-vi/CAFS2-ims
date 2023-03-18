<?php

namespace App\Http\Requests\Items;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name' => ['required', 'min:2'],
            'owner.id' => ['required', 'exists:owners,id'],
            'type.id' => ['required', 'exists:types,id'],
            'description' => ['nullable', 'min:3'],
            'warranty_start' => ['nullable', 'date_format:"Y-m-d"'],
            'warranty_months' => ['nullable', 'numeric', 'max:255'],
            'warranty_proof' => ['nullable', 'string'],
        ];
    }
}
