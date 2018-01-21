@if(!isset($count_exercise))
    <li id="li_{{$count_day}}" class="list-group-item">
        <div class="form-group row">
            <input type="text" hidden name="day[{{$count_day}}][day_order]" value="{{$count_day}}">
            <label class="col-md-2 col-form-label">Day {{$count_day }}</label>
            <div class="col-md-6">
                <input id="day_{{$count_day}}" name="day[{{$count_day}}][day_name]" type="text" class="form-control" placeholder=" Name">
            </div>
            <div class="col-md-1 pl-1">
                <button type="button" class="btn btn-light"><i class="far fa-trash-alt"></i></button>
            </div>
            <div class="col-md-3">
                <a id="btn_addexercises" data-toggle="collapse" href="#planday_collapse_{{$count_day}}" role="button" aria-expanded="false" aria-controls="planday_collapse_{{$count_day}}">
                    <i class="fa fa-plus fa-sm"></i><small> Exercises</small>
                </a>
            </div>
        </div>
    </li>
    <div class="collapse" id="planday_collapse_{{$count_day}}">
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
                    <button id="btn_addexercise_day_{{$count_day}}" onclick="addExercise(this.id)" class="btn btn-link btn-sm" type="button"><i class="fa fa-plus fa-sm"></i><small> Add exercise</small></button>
                </div>
                <div class="exercise_container_{{$count_day}}">
                    <input type="text" hidden name="day[{{$count_day}}][exercises][1][exercise_order]" value="1">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label form-control-sm" for="day[exercises][1][exercise_id]">Exercise</label>
                        <div class="col-md-9">
                            <select name="day[{{$count_day}}][exercises][1][exercise_id]" class="form-control form-control-sm">
                                <option selected>Choose...</option>
                                @foreach ($exercises as $exercise):
                                <option value="{{$exercise->id}}">{{$exercise->exercise_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label form-control-sm" for="day[{{$count_day}}][exercises][1][exercise_duration]">Duration</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm" name="day[{{$count_day}}][exercises][1][exercise_duration]"  placeholder="" value="" required>
                        </div>
                        <div class="invalid-feedback">
                            Difficulty is required.
                        </div>
                    </div>
                    <hr class="mb-4">
                </div>
            </div>
        </div>
    </div>
@else
    <div class="exercise_container_{{$count_day}}">
        <input type="text" hidden name="day[{{$count_day}}][exercises][{{$count_exercise}}][exercise_order]" value="{{$count_exercise}}">
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label form-control-sm" for="day[{{$count_day}}][exercises][{{$count_exercise}}][exercise_id]">Exercise</label>
            <div class="col-md-9">
                <select name="day[{{$count_day}}][exercises][{{$count_exercise}}][exercise_id]" class="form-control form-control-sm">
                    <option selected>Choose...</option>
                    @foreach ($exercises as $exercise):
                    <option value="{{$exercise->id}}">{{$exercise->exercise_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label form-control-sm" for="day[{{$count_day}}][exercises][{{$count_exercise}}][exercise_duration]">Duration</label>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-sm" name="day[{{$count_day}}][exercises][{{$count_exercise}}][exercise_duration]"  placeholder="" value="" required>
            </div>
            <div class="invalid-feedback">
                Difficulty is required.
            </div>
        </div>
        <hr class="mb-4">
    </div>
@endif