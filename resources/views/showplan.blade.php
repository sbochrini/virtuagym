@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h4">{{$plan->plan_name}}</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Desctiption: {{$plan->plan_description}}</li>
                        <li class="list-group-item">Defficulty: {{$plan->plan_difficulty}}</li>
                        <li class="list-group-item">Plan days
                            @foreach($plan->days as $day)
                                <p>{{$day->day_order}}. {{$day->day_name}}</p>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-1"><a href="{{ url('plans') }}" class="btn btn-primary" role="button">Go Back</a></div>
    </div>
@endsection