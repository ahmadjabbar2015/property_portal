<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SaleLeaseRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
                'property_id' => 'required',
                'total_sale_price ' => 'required',
                'sale_advance_payment ' => 'required',
                'customer_id' => 'required',
                'remaing_payment' => 'required',
                'lease_start' => 'required',
                'lease_end' => 'required',
                'due_date' => 'required',
                'frequency_collection' => 'required',
                'number_of_years_month	' => 'required',  
                'payment_per_frequency	' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Validation Errors',
        'data'      => $validator->errors()
        ]));
    }
}