@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Listing <a href="#" class="pull-right btn btn-default btn-xs">Go Back</a></div>

                <div class="panel-body">
                    {{Form::open(['action' => 'PlandayController@store','method' => 'POST'])}}
                    <div class="form-group">
                        {{ Form::label('day_name', null, ['class' => 'control-label']) }}
                        {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
                    </div>
                    {{Form::text('day_name','',['placeholder' => 'Day name'])}}
                    {{Form::number('order','',['placeholder' => 'order'])}}
                    {{Form::submit('Submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
