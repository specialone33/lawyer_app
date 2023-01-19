<?php

namespace App\Http\Requests;

use App\Models\CompanyContract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_contract_edit');
    }

    public function rules()
    {
        return [
            'case_file_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'registration_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'customers.*' => [
                'integer',
            ],
            'customers' => [
                'required',
                'array',
            ],
            'opponent' => [
                'string',
                'required',
            ],
            'signing_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'lawyer_id' => [
                'required',
                'integer',
            ],
            'hours' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'custom_one_time_fee_name' => [
                'string',
                'nullable',
            ],
            'alterations.*' => [
                'integer',
            ],
            'alterations' => [
                'array',
            ],
        ];
    }
}
