@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <div class="panel panel-default">
                    <ul class="list-group">
                        <div class="panel-body">
                            <li class="list-group-item list-group-item-action list-group-item-primary">Users</li>
                            @if(count($users))
                                @foreach($users as $user)
                                    <li class="list-group-item"><a href="users/{{$user->id}}">{{$user->lastname}} {{$user->firstname}}</a></li>
                                @endforeach
                            @else
                                <p>No Users Found</p>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </div>
@endsection