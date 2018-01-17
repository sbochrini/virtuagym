@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="card border-info mb-3">
                {{--<div class="card-header"><a href="plans/{{$plan->id}}">{{$plan->plan_name}}</a></div>--}}
               <div class="card-body">
                    <h5 class="card-title">Workout Plans</h5>
                    <ul class="list-group ">
                        @if(count($plans))
                            @foreach($plans as $plan)
                                <li class="list-group-item mb-1"><a href="plans/{{$plan->id}}">{{$plan->plan_name}}</a></li>
                                {{--<p class="card-text">{{$plan->plan_description}}</p>
                                <a href="plans/{{$plan->id}}" class="btn btn-info btn-sm">Details</a>--}}
                            @endforeach
                        @else
                            <p>No Plans Found</p>
                        @endif
                    </ul>
                   <a href="#" class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Add Plan</a>
                </div>
            </div>

            {{--<div class="panel panel-default">
                <ul class="list-group">
                    <div class="panel-body">
                        <li class="list-group-item list-group-item-action list-group-item-primary">Plans</li>
                        @if(count($plans))
                            @foreach($plans as $plan)
                                <li class="list-group-item"><a href="plans/{{$plan->id}}">{{$plan->plan_name}}</a></li>
                            @endforeach
                        @else
                            <p>No Plans Found</p>
                        @endif
                    </div>
                </ul>
            </div>--}}
        </div>
    </div>
@endsection