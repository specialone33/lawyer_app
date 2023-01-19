@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contract.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contract->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.case_file_number') }}
                                    </th>
                                    <td>
                                        {{ $contract->case_file_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.registration_date') }}
                                    </th>
                                    <td>
                                        {{ $contract->registration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.contract_type') }}
                                    </th>
                                    <td>
                                        {{ $contract->contract_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.contract_description') }}
                                    </th>
                                    <td>
                                        {{ $contract->contract_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $contract->user->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.customers') }}
                                    </th>
                                    <td>
                                        @foreach($contract->customers as $key => $customers)
                                            <span class="label label-info">{{ $customers->surname }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.opponent') }}
                                    </th>
                                    <td>
                                        {{ $contract->opponent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.signing_date') }}
                                    </th>
                                    <td>
                                        {{ $contract->signing_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.lawyer') }}
                                    </th>
                                    <td>
                                        {{ $contract->lawyer->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.comments') }}
                                    </th>
                                    <td>
                                        {{ $contract->comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.charging_expenses') }}
                                    </th>
                                    <td>
                                        {{ $contract->charging_expenses }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.hours') }}
                                    </th>
                                    <td>
                                        {{ $contract->hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.hourly_rate') }}
                                    </th>
                                    <td>
                                        {{ $contract->hourly_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.one_time_fees') }}
                                    </th>
                                    <td>
                                        {{ $contract->one_time_fees->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.custom_one_time_fee_name') }}
                                    </th>
                                    <td>
                                        {{ $contract->custom_one_time_fee_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contract.fields.custom_one_time_fee_value') }}
                                    </th>
                                    <td>
                                        {{ $contract->custom_one_time_fee_value }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contracts.index') }}">
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