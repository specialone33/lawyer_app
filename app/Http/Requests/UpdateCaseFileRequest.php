<?php

namespace App\Http\Requests;

use App\Models\CaseFile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCaseFileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_file_edit');
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
            'case_type_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'court_id' => [
                'required',
                'integer',
            ],
            'procedural_process_id' => [
                'required',
                'integer',
            ],
            'hearing' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'case_status_id' => [
                'required',
                'integer',
            ],
            'next_actions' => [
                'string',
                'nullable',
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
            'lawyer_id' => [
                'required',
                'integer',
            ],
            'petition_filing_number' => [
                'string',
                'nullable',
            ],
            'decision_number' => [
                'string',
                'nullable',
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
        ];
    }
}
