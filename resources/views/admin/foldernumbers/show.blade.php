@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.foldernumber.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.foldernumbers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.casefile') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->casefile->case_description ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.contract') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->contract->contract_description ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.companycontract') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->companycontract->contract_description ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.other_cases') }}
                                    </th>
                                    <td>
                                        {{ $foldernumber->other_cases->case_description ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.foldernumbers.index') }}">
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