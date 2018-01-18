@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add day</div>

                <div class="panel-body">
                    {{Form::open(['action' => 'PlandayController@store','method' => 'POST'])}}
                    <div class="form-group">
                        {{ Form::label('day_name', null, ['class' => 'control-label']) }}
                        {{ Form::text('day_name', "",['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('order', null, ['class' => 'control-label']) }}
                        {{ Form::text('order', "",['class' => 'form-control']) }}
                    </div>
                    <div class="row m1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('Exercise', null, ['class' => 'control-label']) }}
                                {{ Form::select('exercise', $exercises, null, ['placeholder' => 'Pick an exercise...','class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm align-self-center">
                            <div class="form-group">
                                <button class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Add Exercise</button>
                            </div>
                        </div>
                    </div>
                    <div class="row m1">
                        <div class="col-sm">
                            <div class="form-group">
                                {{ Form::label('Duration', null, ['class' => 'control-label']) }}
                                {{ Form::text('exersice_duration', "",['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                {{ Form::label('order', null, ['class' => 'control-label']) }}
                                {{ Form::text('exersice_order', "",['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    {{Form::submit('Save day',['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-7"></div>
        <div class="col-md-1"><a href="{{ url('plans') }}" class="btn btn-primary" role="button">Go Back</a></div>
    </div>
@endsection
