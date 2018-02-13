@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.computers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.computers.fields.name')</th>
                            <td field-key='name'>{{ $computer->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.mac')</th>
                            <td field-key='mac'>{{ $computer->mac }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.os')</th>
                            <td field-key='os'>{{ $computer->os }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.owner')</th>
                            <td field-key='owner'>{{ $computer->owner }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.location')</th>
                            <td field-key='location'>{{ $computer->location->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.location.fields.address')</th>
                            <td field-key='address'>{{ isset($computer->location) ? $computer->location->address : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.details')</th>
                            <td field-key='details'>{{ $computer->details }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.factura')</th>
                            <td field-key='factura'>@if($computer->factura)<a href="{{ asset(env('UPLOAD_PATH').'/' . $computer->factura) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.computers.fields.status')</th>
                            <td field-key='status'>{{ $computer->status }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.computers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
