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