<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LeaseRequest extends FormRequest
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
                'rent ' => 'required',
                'tenant_id ' => 'required',
                'new_teanants_id' => 'required',
                'new_teanants_id' => 'required',
                'advance_payments' => 'required',
                'lease_start' => 'required',
                'lease_end' => 'required',
                'due_date' => 'required',
                'frequency_collection' => 'required',
                'total_payment' => 'required',  
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
