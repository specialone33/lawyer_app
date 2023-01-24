@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.foldernumber.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Foldernumber">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.casefile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.contract') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.companycontract') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.foldernumber.fields.other_cases') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($foldernumbers as $key => $foldernumber)
                                    <tr data-entry-id="{{ $foldernumber->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $foldernumber->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->casefile->case_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->casefile->case_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->contract->contract_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->companycontract->contract_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $foldernumber->other_cases->case_description ?? '' }}
                                        </td>
                                        <td>
                                            @can('foldernumber_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.foldernumbers.show', $foldernumber->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan



                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Foldernumber:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection