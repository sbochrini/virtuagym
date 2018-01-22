@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Users</h5>
                </div>
                <div class="col">
                    <button id="btn_add_user" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Add new User</button>
                </div>
            </div>
            <ul id="plans_ul" class="list-group">
                @if(count($users))
                    @foreach($users as $user)
                        <li class="list-group-item mb-1">
                            <div class="row">
                                <div class="col-md-auto">
                                    <img src="user.png" style="height: 117px; width: 117px;">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-title">{{$user->lastname}} {{$user->firstname}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <a class="btn btn-outline-dark btn-sm" href="{{ url('/users/' . $user->id . '/edit') }}" role="button"><i class="far fa-edit"></i> Edit</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-outline-danger btn-sm" href="{{ url('/users/' . $user->id . '/delete') }}" role="button"><i class="far fa-trash-alt"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a data-toggle="collapse" href="#user_collapse{{$user->id}}" role="button" aria-expanded="false" aria-controls="user_collapse{{$user->id}}">
                                                <small>Details</small>
                                            </a>
                                            <div class="collapse" id="user_collapse{{$user->id}}">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text"><small>Email: {{$user->email}}</small></p>
                                                        <p class="card-text"><small>Phone: {{$user->phone}}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="col">
                                            <a class="btn btn-outline-danger btn-sm" href="{{ url('/users/' . $user->id . '/delete') }}" role="button"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>--}}
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
        <div id="div_add_user" class="col-md-6 col-md-offset-2">

        </div>
    </div>
@endsection