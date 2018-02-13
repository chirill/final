@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.apps.title')</h3>
    
    {!! Form::model($app, ['method' => 'PUT', 'route' => ['admin.apps.update', $app->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.apps.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.apps.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('configs', trans('quickadmin.apps.fields.configs').'', ['class' => 'control-label']) !!}
                    {!! Form::text('configs', old('configs'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('configs'))
                        <p class="help-block">
                            {{ $errors->first('configs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('path', trans('quickadmin.apps.fields.path').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('path', old('path')) !!}
                    @if ($app->path)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $app->path) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('path', ['class' => 'form-control']) !!}
                    {!! Form::hidden('path_max_size', 1000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('path'))
                        <p class="help-block">
                            {{ $errors->first('path') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

