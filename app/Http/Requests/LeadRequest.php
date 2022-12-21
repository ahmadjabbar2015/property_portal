<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LeadRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        
                'client_name' => 'required',
                'client_contact' => 'required',
                'propertytype_id' => 'required',
                'source_id' => 'required',
                'status' => 'required',
                'user_id' => 'required',
                'attempt_status' => 'required',
                'customer_status' => 'required',
            
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
