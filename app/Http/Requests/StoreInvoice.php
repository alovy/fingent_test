<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreInvoice extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                            
                'customer_name' => 'required|string|max:50',
                'customer_email' => 'nullable|string|max:50',
                'customer_contact' => 'nullable|string|max:15',
                
                'sub_total' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'total' => 'required|numeric',
    
                'items' => 'array|required',
                'items.*.item_name' => 'required|string|max:50',
                'items.*.quantity' => 'required|numeric|gt:0',
                'items.*.unit_price' => 'required|numeric',
                'items.*.total' => 'required|numeric',
                'items.*.tax_percent' => 'required|numeric',

        ];
    }
}
