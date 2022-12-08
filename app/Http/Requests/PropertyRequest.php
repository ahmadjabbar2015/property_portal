<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class PropertyRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'rent' => 'required|numeric',
            'propertytype_id' => 'required|numeric',
            'landlord_id' => 'required|numeric',
            'area' => 'required|numeric',
            'deposit' => 'required|max:255',
            // 'description' => 'required|max:255',
            'property_location.search' => 'required',
            'property_location.address' => 'required',
            'property_location.state' => 'required',
            'property_location.city' => 'required',
            'property_location.post' => 'required | max:10',

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
