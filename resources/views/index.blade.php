@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <div class="panel panel-default">
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
                </div>
            </div>
        </div>
@endsection