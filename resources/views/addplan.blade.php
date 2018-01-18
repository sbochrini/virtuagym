<div class="card col-md mt-4 order-md-1">
    <h4 class="mb-3 mt-3">Workout Editor</h4>
    <form class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="plan_name">Workout Name</label>
                <input type="text" class="form-control" id="plan_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Workout name is required.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="plan_dificulty">Difficulty</label>
                <input type="text" class="form-control" id="plan_dificulty" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Difficulty is required.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="plan_description">Description</label>
            <textarea type="text" class="form-control" id="" placeholder="" required></textarea>
            <div class="invalid-feedback">
                Description is required.
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <div class="card" style="min-height: 18rem;">
                    <div class="card-header">
                        Workout plan days
                        <button class="btn btn-link btn-sm float-right"><i class="fa fa-plus fa-sm"></i><small> Add</small></button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{--<li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="card" style="min-height: 18rem;">
                    <div class="card-header">
                        Exercises
                        <button class="btn btn-link btn-sm float-right"><i class="fa fa-plus fa-sm"></i><small> Add</small></button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{--<li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
    </form>
</div>