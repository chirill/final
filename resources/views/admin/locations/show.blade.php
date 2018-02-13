@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.location.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.location.fields.name')</th>
                            <td field-key='name'>{{ $location->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.location.fields.address')</th>
                            <td field-key='address'>{{ $location->address }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#computers" aria-controls="computers" role="tab" data-toggle="tab">Computers</a></li>
<li role="presentation" class=""><a href="#printers" aria-controls="printers" role="tab" data-toggle="tab">Printers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="computers">
<table class="table table-bordered table-striped {{ count($computers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.computers.fields.name')</th>
                        <th>@lang('quickadmin.computers.fields.mac')</th>
                        <th>@lang('quickadmin.computers.fields.os')</th>
                        <th>@lang('quickadmin.computers.fields.owner')</th>
                        <th>@lang('quickadmin.computers.fields.location')</th>
                        <th>@lang('quickadmin.computers.fields.details')</th>
                        <th>@lang('quickadmin.computers.fields.factura')</th>
                        <th>@lang('quickadmin.computers.fields.status')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($computers) > 0)
            @foreach ($computers as $computer)
                <tr data-entry-id="{{ $computer->id }}">
                    <td field-key='name'>{{ $computer->name }}</td>
                                <td field-key='mac'>{{ $computer->mac }}</td>
                                <td field-key='os'>{{ $computer->os }}</td>
                                <td field-key='owner'>{{ $computer->owner }}</td>
                                <td field-key='location'>{{ $computer->location->name or '' }}</td>
                                <td field-key='details'>{{ $computer->details }}</td>
                                <td field-key='factura'>@if($computer->factura)<a href="{{ asset(env('UPLOAD_PATH').'/' . $computer->factura) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='status'>{{ $computer->status }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['computers.restore', $computer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['computers.perma_del', $computer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('computers.show',[$computer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('computers.edit',[$computer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['computers.destroy', $computer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="printers">
<table class="table table-bordered table-striped {{ count($printers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.printers.fields.name')</th>
                        <th>@lang('quickadmin.printers.fields.model')</th>
                        <th>@lang('quickadmin.printers.fields.mac')</th>
                        <th>@lang('quickadmin.printers.fields.ip')</th>
                        <th>@lang('quickadmin.printers.fields.location')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($printers) > 0)
            @foreach ($printers as $printer)
                <tr data-entry-id="{{ $printer->id }}">
                    <td field-key='name'>{{ $printer->name }}</td>
                                <td field-key='model'>{{ $printer->model }}</td>
                                <td field-key='mac'>{{ $printer->mac }}</td>
                                <td field-key='ip'>{{ $printer->ip }}</td>
                                <td field-key='location'>{{ $printer->location->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['printers.restore', $printer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['printers.perma_del', $printer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('printers.show',[$printer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('printers.edit',[$printer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['printers.destroy', $printer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.locations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
