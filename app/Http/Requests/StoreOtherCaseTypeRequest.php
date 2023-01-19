<?php

namespace App\Http\Requests;

use App\Models\OtherCaseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOtherCaseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_case_type_create');
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
