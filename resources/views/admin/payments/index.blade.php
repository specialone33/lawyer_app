@extends('layouts.admin')
@section('content')
<div class="content">
    @can('payment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.payments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.payment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.payment.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customer.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.casefile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.contract') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.companycontract') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.other_case') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key => $payment)
                                    <tr data-entry-id="{{ $payment->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $payment->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->customer->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->customer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->payment_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->casefile->case_file_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->contract->case_file_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->companycontract->case_file_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->other_case->case_file_number ?? '' }}
                                        </td>
                                        <td>
                                            @can('payment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.payments.show', $payment->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('payment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.payments.edit', $payment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('payment_delete')
                                                <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
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
@can('payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Payment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection