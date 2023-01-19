@extends('layouts.admin')
@section('content')
<div class="content">
    @can('procedural_process_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.procedural-processes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.proceduralProcess.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.proceduralProcess.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ProceduralProcess">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.proccess') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_days') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_days_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.service_of_suit_before_after') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_days') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_motions_before_after') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_days') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceduralProcess.fields.filing_add_sentences_before_after') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proceduralProcesses as $key => $proceduralProcess)
                                    <tr data-entry-id="{{ $proceduralProcess->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $proceduralProcess->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->user->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->user->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->proccess->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->service_of_suit_days ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::SERVICE_OF_SUIT_DAYS_TYPE_RADIO[$proceduralProcess->service_of_suit_days_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::SERVICE_OF_SUIT_BEFORE_AFTER_RADIO[$proceduralProcess->service_of_suit_before_after] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->filing_motions_days ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::FILING_MOTIONS_TYPE_RADIO[$proceduralProcess->filing_motions_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::FILING_MOTIONS_BEFORE_AFTER_RADIO[$proceduralProcess->filing_motions_before_after] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceduralProcess->filing_add_sentences_days ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::FILING_ADD_SENTENCES_TYPE_RADIO[$proceduralProcess->filing_add_sentences_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ProceduralProcess::FILING_ADD_SENTENCES_BEFORE_AFTER_RADIO[$proceduralProcess->filing_add_sentences_before_after] ?? '' }}
                                        </td>
                                        <td>
                                            @can('procedural_process_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.procedural-processes.show', $proceduralProcess->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('procedural_process_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.procedural-processes.edit', $proceduralProcess->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('procedural_process_delete')
                                                <form action="{{ route('admin.procedural-processes.destroy', $proceduralProcess->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('procedural_process_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.procedural-processes.massDestroy') }}",
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
  let table = $('.datatable-ProceduralProcess:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection