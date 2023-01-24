<?php

namespace App\Http\Requests;

use App\Models\Foldernumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFoldernumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('foldernumber_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
