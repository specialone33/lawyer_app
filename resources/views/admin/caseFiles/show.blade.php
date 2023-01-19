@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.caseFile.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.case-files.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_file_number') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->case_file_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.registration_date') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->registration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_type') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->case_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_description') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->case_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->user->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.court') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->court->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.procedural_process') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->procedural_process->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hearing') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->hearing }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_status') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->case_status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.next_actions') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->next_actions }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.customers') }}
                                    </th>
                                    <td>
                                        @foreach($caseFile->customers as $key => $customers)
                                            <span class="label label-info">{{ $customers->surname }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.opponent') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->opponent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.lawyer') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->lawyer->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.comments') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.petition_filing_number') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->petition_filing_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.decision_number') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->decision_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.charging_expenses') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->charging_expenses }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hours') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hourly_rate') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->hourly_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.one_time_fees') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->one_time_fees->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.custom_one_time_fee_name') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->custom_one_time_fee_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.custom_one_time_fee_value') }}
                                    </th>
                                    <td>
                                        {{ $caseFile->custom_one_time_fee_value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.case-files.index') }}">
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