@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.computers.title')</h3>
    @can('computer_create')
    <p>
        <a href="{{ route('admin.computers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('computer_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.computers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.computers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($computers) > 0 ? 'datatable' : '' }} @can('computer_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('computer_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.computers.fields.name')</th>
                        <th>@lang('quickadmin.computers.fields.mac')</th>
                        <th>@lang('quickadmin.computers.fields.os')</th>
                        <th>@lang('quickadmin.computers.fields.owner')</th>
                        <th>@lang('quickadmin.computers.fields.location')</th>
                        <th>@lang('quickadmin.location.fields.address')</th>
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
                                @can('computer_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $computer->name }}</td>
                                <td field-key='mac'>{{ $computer->mac }}</td>
                                <td field-key='os'>{{ $computer->os }}</td>
                                <td field-key='owner'>{{ $computer->owner }}</td>
                                <td field-key='location'>{{ $computer->location->name or '' }}</td>
<td field-key='address'>{{ isset($computer->location) ? $computer->location->address : '' }}</td>
                                <td field-key='details'>{{ $computer->details }}</td>
                                <td field-key='factura'>@if($computer->factura)<a href="{{ asset(env('UPLOAD_PATH').'/' . $computer->factura) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='status'>{{ $computer->status }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('computer_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.computers.restore', $computer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('computer_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.computers.perma_del', $computer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('computer_view')
                                    <a href="{{ route('admin.computers.show',[$computer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('computer_edit')
                                    <a href="{{ route('admin.computers.edit',[$computer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('computer_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.computers.destroy', $computer->id])) !!}
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
    </div>
@stop

@section('javascript') 
    <script>
        @can('computer_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.computers.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection