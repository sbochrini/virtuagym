@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$user->firstname}} {{$user->lastname}}<a href="{{ url('users') }}" class="pull-right btn btn-default btn-xs">Go Back</a></div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Firstname: {{$user->firstname}}</li>
                        <li class="list-group-item">Lastname: {{$user->lastname}}</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                        <li class="list-group-item">Phone: {{$user->phone}}</li>
                    </ul>
                    {{--<hr>--}}
                    {{--<div class="well">
                        {{$listing->bio}}
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection