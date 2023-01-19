<?php

namespace App\Http\Requests;

use App\Models\OneTimeFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOneTimeFeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('one_time_fee_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'value' => [
                'required',
            ],
        ];
    }
}
