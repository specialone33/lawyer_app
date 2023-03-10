@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.basi.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.basis.update", [$basi->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.basi.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $basi->title) }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.basi.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label class="required" for="link">{{ trans('cruds.basi.fields.link') }}</label>
                            <input class="form-control" type="text" name="link" id="link" value="{{ old('link', $basi->link) }}" required>
                            @if($errors->has('link'))
                                <span class="help-block" role="alert">{{ $errors->first('link') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.basi.fields.link_helper') }}</span>
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