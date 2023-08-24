@extends('layouts.admin')
@section('content')
@can('campaign_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.campaigns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.campaign.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.campaign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Campaign">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.campain_photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.order') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.campaign.fields.description') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Campaign::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Campaign">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.campain_photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.campaign.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Campaign::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaigns as $key => $campaign)
                        <tr data-entry-id="{{ $campaign->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $campaign->id ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->name ?? '' }}
                            </td>
                            <td>
                                @if($campaign->campain_photo)
                                    <a href="{{ $campaign->campain_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $campaign->campain_photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $campaign->order ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Campaign::STATUS_SELECT[$campaign->status] ?? '' }}
                            </td>
                            <td>
                                {{ $campaign->description ?? '' }}
                            </td>
                            <td>
                                @can('campaign_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.campaigns.show', $campaign->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('campaign_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.campaigns.edit', $campaign->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('campaign_delete')
                                    <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('campaign_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.campaigns.massDestroy') }}",
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
    ajax: "{{ route('admin.campaigns.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'campain_photo', name: 'campain_photo', sortable: false, searchable: false },
{ data: 'order', name: 'order' },
{ data: 'status', name: 'status' },
{ data: 'description', name: 'description' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Campaign').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection