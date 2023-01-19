@extends('layouts.admin')
@section('content')
<div class="content">
    @can('company_contract_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.company-contracts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.companyContract.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.companyContract.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CompanyContract">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.case_file_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.registration_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.company_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.contract_description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.surname') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.customers') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.opponent') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.signing_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.lawyer') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lawyer.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.comments') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.charging_expenses') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.hours') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.hourly_rate') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.one_time_fees') }}
                                </th>
                                <th>
                                    {{ trans('cruds.oneTimeFee.fields.value') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.custom_one_time_fee_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.custom_one_time_fee_value') }}
                                </th>
                                <th>
                                    {{ trans('cruds.companyContract.fields.alterations') }}
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
@can('company_contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.company-contracts.massDestroy') }}",
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
    ajax: "{{ route('admin.company-contracts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'case_file_number', name: 'case_file_number' },
{ data: 'registration_date', name: 'registration_date' },
{ data: 'company_type_name', name: 'company_type.name' },
{ data: 'contract_description', name: 'contract_description' },
{ data: 'user_surname', name: 'user.surname' },
{ data: 'user.email', name: 'user.email' },
{ data: 'user.surname', name: 'user.surname' },
{ data: 'customers', name: 'customers.surname' },
{ data: 'opponent', name: 'opponent' },
{ data: 'signing_date', name: 'signing_date' },
{ data: 'lawyer_surname', name: 'lawyer.surname' },
{ data: 'lawyer.name', name: 'lawyer.name' },
{ data: 'comments', name: 'comments' },
{ data: 'charging_expenses', name: 'charging_expenses' },
{ data: 'hours', name: 'hours' },
{ data: 'hourly_rate', name: 'hourly_rate' },
{ data: 'one_time_fees_name', name: 'one_time_fees.name' },
{ data: 'one_time_fees.value', name: 'one_time_fees.value' },
{ data: 'custom_one_time_fee_name', name: 'custom_one_time_fee_name' },
{ data: 'custom_one_time_fee_value', name: 'custom_one_time_fee_value' },
{ data: 'alterations', name: 'alterations.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-CompanyContract').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection