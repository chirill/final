@extends('layouts.app')

@section('content')
    <h3 class="page-title">Roles</h3>
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('name', 'Role name'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif

                    {!! Form::label('description','Role description',['class' => 'control-label']) !!}
                    {!! Form::text('description',null,['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

