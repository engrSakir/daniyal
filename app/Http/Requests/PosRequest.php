<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

      /*
        basket
        waiter
        table
        phone
        address

        parcel
        delivery_charge

        discount_percentage
        discount_fixed_amount
        */

    public function rules()
    {
        if($this->has('parcel'))
        {
            $rules['delivery_charge'] = 'required|numeric|min:0';
            $rules['phone'] = 'required|string|min:11|max:11';
        }else{
            $rules['table'] = 'required|exists:tables:id';
            $rules['phone'] = 'nullable|string|min:11|max:11';
        }
        $rules['waiter'] = 'required|min:3';
        $rules['address'] = 'nullable|string';
        $rules['discount_percentage'] = 'required|numeric|min:0';
        $rules['discount_fixed_amount'] = 'required|numeric|min:0';

        return $rules;
    }
}
