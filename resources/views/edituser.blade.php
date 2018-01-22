@extends('layouts.app')

@section('content')
    <div class="card col-md pb-3 order-md-1">
        <h4 class="mb-3 mt-3">User Editor</h4>
        {{ Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'form-control']) }}
        <div class="form-group">
            {!! Form::label('Firstame') !!}
            {!! Form::text('firstname', null,
            array('required',
            'class'=>'form-control',
            //'placeholder'=>'Your name'
            )) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Lastame') !!}
            {!! Form::text('lastname', null,
            array('required',
            'class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('E-mail Address') !!}
            {!! Form::text('email', null,
            array('required',
            'class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone') !!}
            {!! Form::text('phone', null,
            array('required',
            'class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Plans') !!}
            {!! Form::select('plans[]', $plans, null,  array('multiple' => true, 'class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save',
            array('class'=>'btn btn-success float-right')) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection