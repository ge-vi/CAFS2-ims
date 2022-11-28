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
            'item_name' => ['required', 'min:3'],
            'item_owner' => ['required'],
            'item_type' => ['required'],
            'item_description' => ['min:3'],
            'item_warranty_start' => ['required'],
            'item_warranty_months' => ['required'],
            'item_warranty_proof' => ['required'],
        ];
    }
}
