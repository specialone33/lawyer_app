@extends('layouts.admin')
@section('content')
<div class="content">
    @can('one_time_fee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.one-time-fees.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.oneTimeFee.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.oneTimeFee.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-OneTimeFee">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.oneTimeFee.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.oneTimeFee.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.oneTimeFee.fields.value') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oneTimeFees as $key => $oneTimeFee)
                                    <tr data-entry-id="{{ $oneTimeFee->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $oneTimeFee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $oneTimeFee->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $oneTimeFee->value ?? '' }}
                                        </td>
                                        <td>
                                            @can('one_time_fee_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.one-time-fees.show', $oneTimeFee->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('one_time_fee_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.one-time-fees.edit', $oneTimeFee->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('one_time_fee_delete')
                                                <form action="{{ route('admin.one-time-fees.destroy', $oneTimeFee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('one_time_fee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.one-time-fees.massDestroy') }}",
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
  let table = $('.datatable-OneTimeFee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection