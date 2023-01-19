<?php

namespace App\Http\Requests;

use App\Models\OtherCaseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOtherCaseTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('other_case_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:other_case_types,id',
        ];
    }
}
