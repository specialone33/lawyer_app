@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.otherCase.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.other-cases.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.case_file_number') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->case_file_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.registration_date') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->registration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.case_type') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->case_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.case_description') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->case_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->user->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.customers') }}
                                    </th>
                                    <td>
                                        @foreach($otherCase->customers as $key => $customers)
                                            <span class="label label-info">{{ $customers->surname }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.opponent') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->opponent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.lawyer') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->lawyer->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.comments') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.charging_expenses') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->charging_expenses }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.hours') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.hourly_rate') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->hourly_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.one_time_fees') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->one_time_fees->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.custom_one_time_fee_name') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->custom_one_time_fee_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.otherCase.fields.custom_one_time_fee_value') }}
                                    </th>
                                    <td>
                                        {{ $otherCase->custom_one_time_fee_value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.other-cases.index') }}">
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