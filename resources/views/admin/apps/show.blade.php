@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.apps.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.apps.fields.name')</th>
                            <td field-key='name'>{{ $app->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.apps.fields.description')</th>
                            <td field-key='description'>{{ $app->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.apps.fields.configs')</th>
                            <td field-key='configs'>{{ $app->configs }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.apps.fields.path')</th>
                            <td field-key='path'>@if($app->path)<a href="{{ asset(env('UPLOAD_PATH').'/' . $app->path) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.apps.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
