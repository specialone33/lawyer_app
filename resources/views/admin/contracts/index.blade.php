@extends('layouts.admin')
@section('content')
<div class="content">
    @can('contract_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.contracts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contract.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.contract.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Contract">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.case_file_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.registration_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.contract_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.surname') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.customers') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.opponent') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.signing_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contract.fields.lawyer') }}
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
@can('contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contracts.massDestroy') }}",
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
    ajax: "{{ route('admin.contracts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'case_file_number', name: 'case_file_number' },
{ data: 'registration_date', name: 'registration_date' },
{ data: 'contract_type_name', name: 'contract_type.name' },
{ data: 'user_surname', name: 'user.surname' },
{ data: 'user.email', name: 'user.email' },
{ data: 'user.surname', name: 'user.surname' },
{ data: 'customers', name: 'customers.surname' },
{ data: 'opponent', name: 'opponent' },
{ data: 'signing_date', name: 'signing_date' },
{ data: 'lawyer_surname', name: 'lawyer.surname' },
{ data: 'lawyer.name', name: 'lawyer.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Contract').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection