<?php

namespace App\Http\Requests\Items;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
        // TODO item owner and item type should be checked in DBS
        return [
            'name' => ['required', 'min:2'],
            'owner_id' => ['required'],
            'type_id' => ['required'],
            'description' => ['min:3'],
            'warranty_start' => ['required'],
            'warranty_months' => ['required'],
            'warranty_proof' => ['required'],
        ];
    }
}
