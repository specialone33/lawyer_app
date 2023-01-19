<?php

namespace App\Http\Requests;

use App\Models\CaseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCaseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_type_create');
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
