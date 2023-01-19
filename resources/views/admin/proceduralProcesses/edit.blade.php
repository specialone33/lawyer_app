@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.proceduralProcess.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.procedural-processes.update", [$proceduralProcess->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="user_id">{{ trans('cruds.proceduralProcess.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $proceduralProcess->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proccess') ? 'has-error' : '' }}">
                            <label class="required" for="proccess_id">{{ trans('cruds.proceduralProcess.fields.proccess') }}</label>
                            <select class="form-control select2" name="proccess_id" id="proccess_id" required>
                                @foreach($proccesses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('proccess_id') ? old('proccess_id') : $proceduralProcess->proccess->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proccess'))
                                <span class="help-block" role="alert">{{ $errors->first('proccess') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.proccess_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service_of_suit_days') ? 'has-error' : '' }}">
                            <label class="required" for="service_of_suit_days">{{ trans('cruds.proceduralProcess.fields.service_of_suit_days') }}</label>
                            <input class="form-control" type="number" name="service_of_suit_days" id="service_of_suit_days" value="{{ old('service_of_suit_days', $proceduralProcess->service_of_suit_days) }}" step="1" required>
                            @if($errors->has('service_of_suit_days'))
                                <span class="help-block" role="alert">{{ $errors->first('service_of_suit_days') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.service_of_suit_days_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service_of_suit_days_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.service_of_suit_days_type') }}</label>
                            @foreach(App\Models\ProceduralProcess::SERVICE_OF_SUIT_DAYS_TYPE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="service_of_suit_days_type_{{ $key }}" name="service_of_suit_days_type" value="{{ $key }}" {{ old('service_of_suit_days_type', $proceduralProcess->service_of_suit_days_type) === (string) $key ? 'checked' : '' }} required>
                                    <label for="service_of_suit_days_type_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('service_of_suit_days_type'))
                                <span class="help-block" role="alert">{{ $errors->first('service_of_suit_days_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.service_of_suit_days_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service_of_suit_before_after') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.service_of_suit_before_after') }}</label>
                            @foreach(App\Models\ProceduralProcess::SERVICE_OF_SUIT_BEFORE_AFTER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="service_of_suit_before_after_{{ $key }}" name="service_of_suit_before_after" value="{{ $key }}" {{ old('service_of_suit_before_after', $proceduralProcess->service_of_suit_before_after) === (string) $key ? 'checked' : '' }} required>
                                    <label for="service_of_suit_before_after_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('service_of_suit_before_after'))
                                <span class="help-block" role="alert">{{ $errors->first('service_of_suit_before_after') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.service_of_suit_before_after_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_motions_days') ? 'has-error' : '' }}">
                            <label class="required" for="filing_motions_days">{{ trans('cruds.proceduralProcess.fields.filing_motions_days') }}</label>
                            <input class="form-control" type="number" name="filing_motions_days" id="filing_motions_days" value="{{ old('filing_motions_days', $proceduralProcess->filing_motions_days) }}" step="1" required>
                            @if($errors->has('filing_motions_days'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_motions_days') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_motions_days_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_motions_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.filing_motions_type') }}</label>
                            @foreach(App\Models\ProceduralProcess::FILING_MOTIONS_TYPE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="filing_motions_type_{{ $key }}" name="filing_motions_type" value="{{ $key }}" {{ old('filing_motions_type', $proceduralProcess->filing_motions_type) === (string) $key ? 'checked' : '' }} required>
                                    <label for="filing_motions_type_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('filing_motions_type'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_motions_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_motions_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_motions_before_after') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.filing_motions_before_after') }}</label>
                            @foreach(App\Models\ProceduralProcess::FILING_MOTIONS_BEFORE_AFTER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="filing_motions_before_after_{{ $key }}" name="filing_motions_before_after" value="{{ $key }}" {{ old('filing_motions_before_after', $proceduralProcess->filing_motions_before_after) === (string) $key ? 'checked' : '' }} required>
                                    <label for="filing_motions_before_after_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('filing_motions_before_after'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_motions_before_after') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_motions_before_after_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_add_sentences_days') ? 'has-error' : '' }}">
                            <label class="required" for="filing_add_sentences_days">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_days') }}</label>
                            <input class="form-control" type="number" name="filing_add_sentences_days" id="filing_add_sentences_days" value="{{ old('filing_add_sentences_days', $proceduralProcess->filing_add_sentences_days) }}" step="1" required>
                            @if($errors->has('filing_add_sentences_days'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_add_sentences_days') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_days_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_add_sentences_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_type') }}</label>
                            @foreach(App\Models\ProceduralProcess::FILING_ADD_SENTENCES_TYPE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="filing_add_sentences_type_{{ $key }}" name="filing_add_sentences_type" value="{{ $key }}" {{ old('filing_add_sentences_type', $proceduralProcess->filing_add_sentences_type) === (string) $key ? 'checked' : '' }} required>
                                    <label for="filing_add_sentences_type_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('filing_add_sentences_type'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_add_sentences_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('filing_add_sentences_before_after') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_before_after') }}</label>
                            @foreach(App\Models\ProceduralProcess::FILING_ADD_SENTENCES_BEFORE_AFTER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="filing_add_sentences_before_after_{{ $key }}" name="filing_add_sentences_before_after" value="{{ $key }}" {{ old('filing_add_sentences_before_after', $proceduralProcess->filing_add_sentences_before_after) === (string) $key ? 'checked' : '' }} required>
                                    <label for="filing_add_sentences_before_after_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('filing_add_sentences_before_after'))
                                <span class="help-block" role="alert">{{ $errors->first('filing_add_sentences_before_after') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceduralProcess.fields.filing_add_sentences_before_after_helper') }}</span>
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