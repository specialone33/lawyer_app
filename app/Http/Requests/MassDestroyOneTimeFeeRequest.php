<?php

namespace App\Http\Requests;

use App\Models\OneTimeFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOneTimeFeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('one_time_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:one_time_fees,id',
        ];
    }
}
