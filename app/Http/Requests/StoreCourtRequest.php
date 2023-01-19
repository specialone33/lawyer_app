<?php

namespace App\Http\Requests;

use App\Models\Court;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('court_create');
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
