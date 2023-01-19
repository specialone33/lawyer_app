<?php

namespace App\Http\Requests;

use App\Models\Proccess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProccessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proccess_edit');
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
