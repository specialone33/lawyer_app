<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'surname' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'vat_number' => [
                'string',
                'nullable',
            ],
            'tax_office' => [
                'string',
                'nullable',
            ],
            'telephone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
