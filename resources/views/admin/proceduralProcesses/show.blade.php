@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.proceduralProcess.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procedural-processes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->user->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.proccess') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->proccess->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_days') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->service_of_suit_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_days_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::SERVICE_OF_SUIT_DAYS_TYPE_RADIO[$proceduralProcess->service_of_suit_days_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_before_after') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::SERVICE_OF_SUIT_BEFORE_AFTER_RADIO[$proceduralProcess->service_of_suit_before_after] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_days') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->filing_motions_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::FILING_MOTIONS_TYPE_RADIO[$proceduralProcess->filing_motions_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_before_after') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::FILING_MOTIONS_BEFORE_AFTER_RADIO[$proceduralProcess->filing_motions_before_after] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_days') }}
                                    </th>
                                    <td>
                                        {{ $proceduralProcess->filing_add_sentences_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::FILING_ADD_SENTENCES_TYPE_RADIO[$proceduralProcess->filing_add_sentences_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_before_after') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ProceduralProcess::FILING_ADD_SENTENCES_BEFORE_AFTER_RADIO[$proceduralProcess->filing_add_sentences_before_after] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procedural-processes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection