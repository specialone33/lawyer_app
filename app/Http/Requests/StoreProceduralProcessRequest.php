<?php

namespace App\Http\Requests;

use App\Models\ProceduralProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProceduralProcessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('procedural_process_create');
    }

    public function rules()
    {
        return [
            'proccess_id' => [
                'required',
                'integer',
            ],
            'service_of_suit_days' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'service_of_suit_days_type' => [
                'required',
            ],
            'service_of_suit_before_after' => [
                'required',
            ],
            'filing_motions_days' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'filing_motions_type' => [
                'required',
            ],
            'filing_motions_before_after' => [
                'required',
            ],
            'filing_add_sentences_days' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'filing_add_sentences_type' => [
                'required',
            ],
            'filing_add_sentences_before_after' => [
                'required',
            ],
        ];
    }
}
