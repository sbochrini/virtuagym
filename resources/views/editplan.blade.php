@extends('layouts.app')

@section('content')
    <div class="card col-md mt-4 order-md-1">
        <h4 class="mb-3 mt-3">Workout Editor</h4>
        <form class="needs-validation" novalidate id="form_updateplan" action="{{ url('plans')}}/{{$plan->id}}/update" method="post">
            {!! csrf_field() !!}
            <input type="text" id="plan_id" name="plan_id" value="{{$plan->id}}" hidden>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="plan_name">Workout Name</label>
                    <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="" value="{{$plan->plan_name}}" required>
                    <div class="invalid-feedback">
                        Workout name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="plan_dificulty">Difficulty</label>
                    <select name="plan_difficulty" class="form-control">
                        <option >Choose...</option>
                        @foreach ($difficulty_levels as $difficulty_level)
                        @php
                            $l_selected=($difficulty_level->id == $plan->plan_difficulty ? "selected" : "");
                        @endphp
                        <option value="{{$difficulty_level->id}}" {{$l_selected}}>{{$difficulty_level->level_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="plan_description">Description</label>
                <textarea type="text" class="form-control" name="plan_description" required>{{$plan->plan_description}}</textarea>
                <div class="invalid-feedback">
                    Description is required.
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-3">
                    <div class="card" style="min-height: 18rem;">
                        <div class="card-header">
                            Workout plan days
                            <button id="btn_addplanday" onclick="addPlanDays()" class="btn btn-link btn-sm float-right" type="button"><i class="fa fa-plus fa-sm"></i><small> Add</small></button>
                        </div>
                        <div class="card-body">
                            <ul id="ul_addplanday" class="list-group list-group-flush">
                                @php
                                    $d=0;

                                @endphp
                                @foreach($plan->days as $day)
                                    @php
                                        $d++;
                                        $e=0;
                                    @endphp
                                    <li id="li_{{$d}}" class="list-group-item">
                                        <div class="form-group row">
                                            <input type="text" hidden name="day[{{$d}}][day_order]" value="{{$d}}">
                                            <label class="col-md-2 col-form-label">Day {{$d}}</label>
                                            <div class="col-md-6">
                                                <input id="day_{{$d}}" name="day[{{$d}}][day_name]" type="text" class="form-control" value="{{$day->day_name}}" placeholder=" Name">
                                            </div>
                                            <div class="col-md-1 pl-1">
                                                <button type="button" class="btn btn-light"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            {{--<div class="col-md-3">
                                                <a id="btn_addexercises" data-toggle="collapse" href="#planday_collapse_{{$d}}" role="button" aria-expanded="false" aria-controls="planday_collapse_{{$d}}">
                                                    <i class="fa fa-plus fa-sm"></i><small> Exercises</small>
                                                </a>
                                            </div>--}}
                                        </div>
                                    </li>
                                    <div class="collapse show" id="planday_collapse_{{$d}}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col mb-3">
                                                    <button id="btn_addexercise_day_{{$d}}" onclick="addExercise(this.id)" class="btn btn-link btn-sm" type="button"><i class="fa fa-plus fa-sm"></i><small> Add exercise</small></button>
                                                </div>
                                                <div class="exercise_container_{{$d}}">
                                                    @foreach($day->exerciseInstances as $exercise)
                                                        @php
                                                        $e++;
                                                        @endphp
                                                        <input type="text" hidden name="day[{{$d}}][exercises][{{$e}}][exercise_order]" value="1">
                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-3 col-form-label form-control-sm" for="day[exercises][{{$e}}][exercise_id]">Exercise</label>
                                                            <div class="col-md-9">
                                                                <select name="day[{{$d}}][exercises][{{$e}}][exercise_id]" class="form-control form-control-sm">
                                                                    <option>Choose...</option>
                                                                    @foreach ($def_exercises as $def_exercise)
                                                                    @php
                                                                        $e_selected=($def_exercise->id == $exercise->exercise_id ?"selected":" ");
                                                                    @endphp
                                                                    <option value="{{$def_exercise->id}}" {{$e_selected}}>{{$def_exercise->exercise_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-3 col-form-label form-control-sm" for="day[{{$d}}][exercises][{{$e}}][exercise_duration]">Duration</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control form-control-sm" name="day[{{$d}}][exercises][{{$e}}][exercise_duration]"  value="{{$exercise->exercise_duration}}" required>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Duration is required.
                                                            </div>
                                                        </div>
                                                        <hr class="mb-4">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md mb-3">
                <button class="btn btn-success" type="submit" id="btn_updateplan" form="form_updateplan" value="Submit">Save</button>
            </div>
            <hr class="mb-4">
        </form>
    </div>
@endsection