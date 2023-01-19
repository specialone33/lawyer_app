<?php

namespace App\Http\Requests;

use App\Models\Lawyer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLawyerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lawyer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'surname' => [
                'string',
                'nullable',
            ],
        ];
    }
}
