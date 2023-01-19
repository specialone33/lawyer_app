<?php

namespace App\Http\Requests;

use App\Models\Lawyer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLawyerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lawyer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lawyers,id',
        ];
    }
}
