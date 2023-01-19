<?php

namespace App\Http\Requests;

use App\Models\OtherCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOtherCaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_case_edit');
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
        ];
    }
}
