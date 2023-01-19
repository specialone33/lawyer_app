<?php

namespace App\Http\Requests;

use App\Models\Court;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourtRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('court_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:courts,id',
        ];
    }
}
