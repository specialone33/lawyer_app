<?php

namespace App\Http\Requests;

use App\Models\Basi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('basi_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
        ];
    }
}
