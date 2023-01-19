@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.caseFile.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.case-files.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('case_file_number') ? 'has-error' : '' }}">
                            <label class="required" for="case_file_number">{{ trans('cruds.caseFile.fields.case_file_number') }}</label>
                            <input class="form-control" type="number" name="case_file_number" id="case_file_number" value="{{ old('case_file_number', '') }}" step="1" required>
                            @if($errors->has('case_file_number'))
                                <span class="help-block" role="alert">{{ $errors->first('case_file_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.case_file_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('registration_date') ? 'has-error' : '' }}">
                            <label class="required" for="registration_date">{{ trans('cruds.caseFile.fields.registration_date') }}</label>
                            <input class="form-control date" type="text" name="registration_date" id="registration_date" value="{{ old('registration_date') }}" required>
                            @if($errors->has('registration_date'))
                                <span class="help-block" role="alert">{{ $errors->first('registration_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.registration_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('case_type') ? 'has-error' : '' }}">
                            <label class="required" for="case_type_id">{{ trans('cruds.caseFile.fields.case_type') }}</label>
                            <select class="form-control select2" name="case_type_id" id="case_type_id" required>
                                @foreach($case_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('case_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('case_type'))
                                <span class="help-block" role="alert">{{ $errors->first('case_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.case_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('case_description') ? 'has-error' : '' }}">
                            <label for="case_description">{{ trans('cruds.caseFile.fields.case_description') }}</label>
                            <textarea class="form-control" name="case_description" id="case_description">{{ old('case_description') }}</textarea>
                            @if($errors->has('case_description'))
                                <span class="help-block" role="alert">{{ $errors->first('case_description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.case_description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.caseFile.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('court') ? 'has-error' : '' }}">
                            <label class="required" for="court_id">{{ trans('cruds.caseFile.fields.court') }}</label>
                            <select class="form-control select2" name="court_id" id="court_id" required>
                                @foreach($courts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('court_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('court'))
                                <span class="help-block" role="alert">{{ $errors->first('court') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.court_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('procedural_process') ? 'has-error' : '' }}">
                            <label class="required" for="procedural_process_id">{{ trans('cruds.caseFile.fields.procedural_process') }}</label>
                            <select class="form-control select2" name="procedural_process_id" id="procedural_process_id" required>
                                @foreach($procedural_processes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('procedural_process_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('procedural_process'))
                                <span class="help-block" role="alert">{{ $errors->first('procedural_process') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.procedural_process_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hearing') ? 'has-error' : '' }}">
                            <label class="required" for="hearing">{{ trans('cruds.caseFile.fields.hearing') }}</label>
                            <input class="form-control date" type="text" name="hearing" id="hearing" value="{{ old('hearing') }}" required>
                            @if($errors->has('hearing'))
                                <span class="help-block" role="alert">{{ $errors->first('hearing') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.hearing_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('case_status') ? 'has-error' : '' }}">
                            <label class="required" for="case_status_id">{{ trans('cruds.caseFile.fields.case_status') }}</label>
                            <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                @foreach($case_statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('case_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('case_status'))
                                <span class="help-block" role="alert">{{ $errors->first('case_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.case_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('next_actions') ? 'has-error' : '' }}">
                            <label for="next_actions">{{ trans('cruds.caseFile.fields.next_actions') }}</label>
                            <input class="form-control" type="text" name="next_actions" id="next_actions" value="{{ old('next_actions', '') }}">
                            @if($errors->has('next_actions'))
                                <span class="help-block" role="alert">{{ $errors->first('next_actions') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.next_actions_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('customers') ? 'has-error' : '' }}">
                            <label class="required" for="customers">{{ trans('cruds.caseFile.fields.customers') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="customers[]" id="customers" multiple required>
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}" {{ in_array($id, old('customers', [])) ? 'selected' : '' }}>{{ $customer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customers'))
                                <span class="help-block" role="alert">{{ $errors->first('customers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.customers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('opponent') ? 'has-error' : '' }}">
                            <label class="required" for="opponent">{{ trans('cruds.caseFile.fields.opponent') }}</label>
                            <input class="form-control" type="text" name="opponent" id="opponent" value="{{ old('opponent', '') }}" required>
                            @if($errors->has('opponent'))
                                <span class="help-block" role="alert">{{ $errors->first('opponent') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.opponent_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lawyer') ? 'has-error' : '' }}">
                            <label class="required" for="lawyer_id">{{ trans('cruds.caseFile.fields.lawyer') }}</label>
                            <select class="form-control select2" name="lawyer_id" id="lawyer_id" required>
                                @foreach($lawyers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('lawyer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lawyer'))
                                <span class="help-block" role="alert">{{ $errors->first('lawyer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.lawyer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                            <label for="comments">{{ trans('cruds.caseFile.fields.comments') }}</label>
                            <textarea class="form-control" name="comments" id="comments">{{ old('comments') }}</textarea>
                            @if($errors->has('comments'))
                                <span class="help-block" role="alert">{{ $errors->first('comments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.comments_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('petition_filing_number') ? 'has-error' : '' }}">
                            <label for="petition_filing_number">{{ trans('cruds.caseFile.fields.petition_filing_number') }}</label>
                            <input class="form-control" type="text" name="petition_filing_number" id="petition_filing_number" value="{{ old('petition_filing_number', '') }}">
                            @if($errors->has('petition_filing_number'))
                                <span class="help-block" role="alert">{{ $errors->first('petition_filing_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.petition_filing_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('decision_number') ? 'has-error' : '' }}">
                            <label for="decision_number">{{ trans('cruds.caseFile.fields.decision_number') }}</label>
                            <input class="form-control" type="text" name="decision_number" id="decision_number" value="{{ old('decision_number', '') }}">
                            @if($errors->has('decision_number'))
                                <span class="help-block" role="alert">{{ $errors->first('decision_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.decision_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('charging_expenses') ? 'has-error' : '' }}">
                            <label for="charging_expenses">{{ trans('cruds.caseFile.fields.charging_expenses') }}</label>
                            <input class="form-control" type="number" name="charging_expenses" id="charging_expenses" value="{{ old('charging_expenses', '') }}" step="0.01">
                            @if($errors->has('charging_expenses'))
                                <span class="help-block" role="alert">{{ $errors->first('charging_expenses') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.charging_expenses_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hours') ? 'has-error' : '' }}">
                            <label for="hours">{{ trans('cruds.caseFile.fields.hours') }}</label>
                            <input class="form-control" type="number" name="hours" id="hours" value="{{ old('hours', '') }}" step="1">
                            @if($errors->has('hours'))
                                <span class="help-block" role="alert">{{ $errors->first('hours') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.hours_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hourly_rate') ? 'has-error' : '' }}">
                            <label for="hourly_rate">{{ trans('cruds.caseFile.fields.hourly_rate') }}</label>
                            <input class="form-control" type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate', '') }}" step="0.01">
                            @if($errors->has('hourly_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('hourly_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.hourly_rate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('one_time_fees') ? 'has-error' : '' }}">
                            <label for="one_time_fees_id">{{ trans('cruds.caseFile.fields.one_time_fees') }}</label>
                            <select class="form-control select2" name="one_time_fees_id" id="one_time_fees_id">
                                @foreach($one_time_fees as $id => $entry)
                                    <option value="{{ $id }}" {{ old('one_time_fees_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('one_time_fees'))
                                <span class="help-block" role="alert">{{ $errors->first('one_time_fees') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.one_time_fees_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('custom_one_time_fee_name') ? 'has-error' : '' }}">
                            <label for="custom_one_time_fee_name">{{ trans('cruds.caseFile.fields.custom_one_time_fee_name') }}</label>
                            <input class="form-control" type="text" name="custom_one_time_fee_name" id="custom_one_time_fee_name" value="{{ old('custom_one_time_fee_name', '') }}">
                            @if($errors->has('custom_one_time_fee_name'))
                                <span class="help-block" role="alert">{{ $errors->first('custom_one_time_fee_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.custom_one_time_fee_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('custom_one_time_fee_value') ? 'has-error' : '' }}">
                            <label for="custom_one_time_fee_value">{{ trans('cruds.caseFile.fields.custom_one_time_fee_value') }}</label>
                            <input class="form-control" type="number" name="custom_one_time_fee_value" id="custom_one_time_fee_value" value="{{ old('custom_one_time_fee_value', '') }}" step="0.01">
                            @if($errors->has('custom_one_time_fee_value'))
                                <span class="help-block" role="alert">{{ $errors->first('custom_one_time_fee_value') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.caseFile.fields.custom_one_time_fee_value_helper') }}</span>
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