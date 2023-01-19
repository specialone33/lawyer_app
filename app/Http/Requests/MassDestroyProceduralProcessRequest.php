<?php

namespace App\Http\Requests;

use App\Models\ProceduralProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProceduralProcessRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('procedural_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:procedural_processes,id',
        ];
    }
}
