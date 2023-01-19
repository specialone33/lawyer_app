<?php

namespace App\Http\Requests;

use App\Models\CaseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCaseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_type_edit');
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
