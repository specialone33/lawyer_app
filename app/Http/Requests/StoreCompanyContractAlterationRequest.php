<?php

namespace App\Http\Requests;

use App\Models\CompanyContractAlteration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompanyContractAlterationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_contract_alteration_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
