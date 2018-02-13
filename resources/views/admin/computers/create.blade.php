@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.computers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.computers.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.computers.fields.name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('mac', trans('quickadmin.computers.fields.mac').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('mac', old('mac'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mac'))
                        <p class="help-block">
                            {{ $errors->first('mac') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('os', trans('quickadmin.computers.fields.os').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('os', old('os'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('os'))
                        <p class="help-block">
                            {{ $errors->first('os') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('owner', trans('quickadmin.computers.fields.owner').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('owner', old('owner'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('owner'))
                        <p class="help-block">
                            {{ $errors->first('owner') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('location_id', trans('quickadmin.computers.fields.location').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('location_id', $locations, old('location_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location_id'))
                        <p class="help-block">
                            {{ $errors->first('location_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('details', trans('quickadmin.computers.fields.details').'', ['class' => 'control-label']) !!}
                    {!! Form::text('details', old('details'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('details'))
                        <p class="help-block">
                            {{ $errors->first('details') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('factura', trans('quickadmin.computers.fields.factura').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('factura', old('factura')) !!}
                    {!! Form::file('factura', ['class' => 'form-control']) !!}
                    {!! Form::hidden('factura_max_size', 20) !!}
                    <p class="help-block"></p>
                    @if($errors->has('factura'))
                        <p class="help-block">
                            {{ $errors->first('factura') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.computers.fields.status').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $enum_status, old('status'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

