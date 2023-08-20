@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.campaign.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.id') }}
                        </th>
                        <td>
                            {{ $campaign->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.name') }}
                        </th>
                        <td>
                            {{ $campaign->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.campain_photo') }}
                        </th>
                        <td>
                            @if($campaign->campain_photo)
                                <a href="{{ $campaign->campain_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $campaign->campain_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.order') }}
                        </th>
                        <td>
                            {{ $campaign->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Campaign::STATUS_SELECT[$campaign->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.campaign.fields.description') }}
                        </th>
                        <td>
                            {{ $campaign->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.campaigns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection