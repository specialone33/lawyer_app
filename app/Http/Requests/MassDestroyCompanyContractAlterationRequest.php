<?php

namespace App\Http\Requests;

use App\Models\CompanyContractAlteration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCompanyContractAlterationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('company_contract_alteration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:company_contract_alterations,id',
        ];
    }
}
