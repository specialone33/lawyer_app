@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.companyContract.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.company-contracts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.case_file_number') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->case_file_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.registration_date') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->registration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.company_type') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->company_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.contract_description') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->contract_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->user->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.customers') }}
                                    </th>
                                    <td>
                                        @foreach($companyContract->customers as $key => $customers)
                                            <span class="label label-info">{{ $customers->surname }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.opponent') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->opponent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.signing_date') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->signing_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.lawyer') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->lawyer->surname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.comments') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->comments }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.charging_expenses') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->charging_expenses }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.hours') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.hourly_rate') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->hourly_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.one_time_fees') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->one_time_fees->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.custom_one_time_fee_name') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->custom_one_time_fee_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.custom_one_time_fee_value') }}
                                    </th>
                                    <td>
                                        {{ $companyContract->custom_one_time_fee_value }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyContract.fields.alterations') }}
                                    </th>
                                    <td>
                                        @foreach($companyContract->alterations as $key => $alterations)
                                            <span class="label label-info">{{ $alterations->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.company-contracts.index') }}">
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