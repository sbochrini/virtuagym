@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Workout Plans</h5>
                </div>
                <div class="col">
                    <button id="btn_add_plan" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Add new Workout Plan</button>
                </div>
            </div>
            <ul class="list-group">
                @if(count($plans))
                    @foreach($plans as $plan)
                        <li class="list-group-item mb-1">
                            <div class="row">
                                <div class="col-md-auto">
                                    <img src="gym2.png" style="height: 117px; width: 117px;">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-title">{{$plan->plan_name}}</div>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-default btn-sm">Edit</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a data-toggle="collapse" href="#plan_collapse{{$plan->id}}" role="button" aria-expanded="false" aria-controls="plan_collapse{{$plan->id}}">
                                                <small>Info</small>
                                            </a>
                                            <div class="collapse" id="plan_collapse{{$plan->id}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text"><small>Difficulty: {{$plan->plan_difficulty}}</small></p>
                                                        <p class="card-text"><small>Description: {{$plan->plan_description}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p>No Plans Found</p>
                @endif
            </ul>
        </div>
        <div id="div_add_plan" class="col-md-6 col-md-offset-2">

        </div>
    </div>
@endsection