@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.printers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.printers.fields.name')</th>
                            <td field-key='name'>{{ $printer->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.printers.fields.model')</th>
                            <td field-key='model'>{{ $printer->model }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.printers.fields.mac')</th>
                            <td field-key='mac'>{{ $printer->mac }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.printers.fields.ip')</th>
                            <td field-key='ip'>{{ $printer->ip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.printers.fields.location')</th>
                            <td field-key='location'>{{ $printer->location->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.printers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
