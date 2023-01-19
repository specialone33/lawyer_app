@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.customer.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }}">
                            <label class="required" for="surname">{{ trans('cruds.customer.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', $customer->surname) }}" required>
                            @if($errors->has('surname'))
                                <span class="help-block" role="alert">{{ $errors->first('surname') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.customer.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $customer->address) }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vat_number') ? 'has-error' : '' }}">
                            <label for="vat_number">{{ trans('cruds.customer.fields.vat_number') }}</label>
                            <input class="form-control" type="text" name="vat_number" id="vat_number" value="{{ old('vat_number', $customer->vat_number) }}">
                            @if($errors->has('vat_number'))
                                <span class="help-block" role="alert">{{ $errors->first('vat_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.vat_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tax_office') ? 'has-error' : '' }}">
                            <label for="tax_office">{{ trans('cruds.customer.fields.tax_office') }}</label>
                            <input class="form-control" type="text" name="tax_office" id="tax_office" value="{{ old('tax_office', $customer->tax_office) }}">
                            @if($errors->has('tax_office'))
                                <span class="help-block" role="alert">{{ $errors->first('tax_office') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.tax_office_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">{{ trans('cruds.customer.fields.telephone') }}</label>
                            <input class="form-control" type="text" name="telephone" id="telephone" value="{{ old('telephone', $customer->telephone) }}">
                            @if($errors->has('telephone'))
                                <span class="help-block" role="alert">{{ $errors->first('telephone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.telephone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.customer.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $customer->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
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