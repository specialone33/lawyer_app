@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.foldernumber.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.foldernumbers.update", [$foldernumber->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label class="required" for="number">{{ trans('cruds.foldernumber.fields.number') }}</label>
                            <input class="form-control" type="number" name="number" id="number" value="{{ old('number', $foldernumber->number) }}" step="1" required>
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.foldernumber.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('casefile') ? 'has-error' : '' }}">
                            <label for="casefile_id">{{ trans('cruds.foldernumber.fields.casefile') }}</label>
                            <select class="form-control select2" name="casefile_id" id="casefile_id">
                                @foreach($casefiles as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('casefile_id') ? old('casefile_id') : $foldernumber->casefile->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('casefile'))
                                <span class="help-block" role="alert">{{ $errors->first('casefile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.foldernumber.fields.casefile_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contract') ? 'has-error' : '' }}">
                            <label for="contract_id">{{ trans('cruds.foldernumber.fields.contract') }}</label>
                            <select class="form-control select2" name="contract_id" id="contract_id">
                                @foreach($contracts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('contract_id') ? old('contract_id') : $foldernumber->contract->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contract'))
                                <span class="help-block" role="alert">{{ $errors->first('contract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.foldernumber.fields.contract_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('companycontract') ? 'has-error' : '' }}">
                            <label for="companycontract_id">{{ trans('cruds.foldernumber.fields.companycontract') }}</label>
                            <select class="form-control select2" name="companycontract_id" id="companycontract_id">
                                @foreach($companycontracts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('companycontract_id') ? old('companycontract_id') : $foldernumber->companycontract->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('companycontract'))
                                <span class="help-block" role="alert">{{ $errors->first('companycontract') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.foldernumber.fields.companycontract_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_cases') ? 'has-error' : '' }}">
                            <label for="other_cases_id">{{ trans('cruds.foldernumber.fields.other_cases') }}</label>
                            <select class="form-control select2" name="other_cases_id" id="other_cases_id">
                                @foreach($other_cases as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('other_cases_id') ? old('other_cases_id') : $foldernumber->other_cases->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('other_cases'))
                                <span class="help-block" role="alert">{{ $errors->first('other_cases') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.foldernumber.fields.other_cases_helper') }}</span>
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