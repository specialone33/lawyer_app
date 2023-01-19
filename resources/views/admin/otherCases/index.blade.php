@extends('layouts.admin')
@section('content')
<div class="content">
    @can('other_case_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.other-cases.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.otherCase.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.otherCase.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OtherCase">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.case_file_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.registration_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.case_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.surname') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.customers') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.opponent') }}
                                </th>
                                <th>
                                    {{ trans('cruds.otherCase.fields.lawyer') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lawyer.fields.name') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>
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
@can('other_case_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.other-cases.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.other-cases.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'case_file_number', name: 'case_file_number' },
{ data: 'registration_date', name: 'registration_date' },
{ data: 'case_type_name', name: 'case_type.name' },
{ data: 'user_surname', name: 'user.surname' },
{ data: 'user.email', name: 'user.email' },
{ data: 'user.surname', name: 'user.surname' },
{ data: 'customers', name: 'customers.surname' },
{ data: 'opponent', name: 'opponent' },
{ data: 'lawyer_surname', name: 'lawyer.surname' },
{ data: 'lawyer.name', name: 'lawyer.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-OtherCase').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection