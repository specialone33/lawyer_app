@extends('layouts.admin')
@section('content')
<div class="content">
    @can('case_file_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.case-files.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.caseFile.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.caseFile.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CaseFile">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_file_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.registration_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.surname') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.court') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.procedural_process') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hearing') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.case_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.next_actions') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.customers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.opponent') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.lawyer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.lawyer.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.comments') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.petition_filing_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.decision_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.charging_expenses') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hours') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.hourly_rate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.one_time_fees') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.oneTimeFee.fields.value') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.custom_one_time_fee_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.caseFile.fields.custom_one_time_fee_value') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($caseFiles as $key => $caseFile)
                                    <tr data-entry-id="{{ $caseFile->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $caseFile->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->case_file_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->registration_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->case_type->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->case_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->user->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->user->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->user->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->court->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->procedural_process->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->hearing ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->case_status->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->next_actions ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($caseFile->customers as $key => $item)
                                                <span class="label label-info label-many">{{ $item->surname }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $caseFile->opponent ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->lawyer->surname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->lawyer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->comments ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->petition_filing_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->decision_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->charging_expenses ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->hours ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->hourly_rate ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->one_time_fees->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->one_time_fees->value ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->custom_one_time_fee_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $caseFile->custom_one_time_fee_value ?? '' }}
                                        </td>
                                        <td>
                                            @can('case_file_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.case-files.show', $caseFile->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('case_file_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.case-files.edit', $caseFile->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('case_file_delete')
                                                <form action="{{ route('admin.case-files.destroy', $caseFile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('case_file_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-files.massDestroy') }}",
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
  let table = $('.datatable-CaseFile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection