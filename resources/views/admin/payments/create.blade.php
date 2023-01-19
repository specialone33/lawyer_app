@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label class="required" for="customer_id">{{ trans('cruds.payment.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.payment.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : '' }}">
                            <label class="required" for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
                            <input class="form-control date" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date') }}" required>
                            @if($errors->has('payment_date'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <span class="help-block" role="alert">{{ $errors->first('amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('casefile') ? 'has-error' : '' }}">
                            <label for="casefile_id">{{ trans('cruds.payment.fields.casefile') }}</label>
                            <select class="form-control select2" name="casefile_id" id="casefile_id">
                                @foreach($casefiles as $id => $entry)
                                    <option value="{{ $id }}" {{ old('casefile_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('casefile'))
                                <span class="help-block" role="alert">{{ $errors->first('casefile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.casefile_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contract') ? 'has-error' : '' }}">
                            <label for="contract_id">{{ trans('cruds.payment.fields.contract') }}</label>
                            <select class="form-control select2" name="contract_id" id="contract_id">
                                @foreach($contracts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('contract_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contract'))
                                <span class="help-block" role="alert">{{ $errors->first('contract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.contract_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('companycontract') ? 'has-error' : '' }}">
                            <label for="companycontract_id">{{ trans('cruds.payment.fields.companycontract') }}</label>
                            <select class="form-control select2" name="companycontract_id" id="companycontract_id">
                                @foreach($companycontracts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('companycontract_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('companycontract'))
                                <span class="help-block" role="alert">{{ $errors->first('companycontract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.companycontract_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_case') ? 'has-error' : '' }}">
                            <label for="other_case_id">{{ trans('cruds.payment.fields.other_case') }}</label>
                            <select class="form-control select2" name="other_case_id" id="other_case_id">
                                @foreach($other_cases as $id => $entry)
                                    <option value="{{ $id }}" {{ old('other_case_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('other_case'))
                                <span class="help-block" role="alert">{{ $errors->first('other_case') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.other_case_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection