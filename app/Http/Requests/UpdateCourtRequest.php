<?php

namespace App\Http\Requests;

use App\Models\Court;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('court_edit');
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
