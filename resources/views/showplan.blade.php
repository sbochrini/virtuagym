@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <h5 class="card-header">{{$plan->plan_name}}</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Difficulty: {{$plan->plan_difficulty}}</h6>
                    <p class="card-text">{{$plan->plan_description}}</p>
                </div>
                @foreach($plan->days as $day)
                    <div class="card bg-light mb-3 ml-3" style="max-width: 25rem;">
                        <div class="card-body">
                            <h6 class="card-title">{{$day->day_name}}</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                @endforeach
                <div class="card-body">
                    <a href="{{ url('plandays')}}/create" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add Day</a>
                    <a href="#" class="btn btn-success float-right">Save</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-1"><a href="{{ url('plans') }}" class="btn btn-primary" role="button">Go Back</a></div>
    </div>
@endsection