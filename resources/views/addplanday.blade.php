<li id="li_{{$count_day}}" class="list-group-item">
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Day {{$count_day }}</label>
        <div class="col-md-6">
            <input id="day_{{$count_day}}" name="day[]" type="text" class="form-control" placeholder=" Name">
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
            <div id="exercise_container">
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <select name=exersice_day_{{$count_day}}[] class="custom-select">
                            <option selected>Select an exercise</option>
                            @foreach ($exercises as $exercise):
                            <option value="{{$exercise->id}}">{{$exercise->exercise_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button id="btn_addexercise" onclick="addExercise()" class="btn btn-link btn-sm float-right" type="button"><i class="fa fa-plus fa-sm"></i><small> Add exercise</small></button>
                    </div>
                </div>
                <div class="form-group row mb-3 pl-3">
                    <label class="col-md-3 col-form-label" for="exercise_duration">Duration</label>
                    <div>
                        <input type="text" class="form-control" name="exercise_duration" id="exercise_duration" placeholder="" value="" required>
                    </div>
                    <div class="invalid-feedback">
                        Difficulty is required.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>