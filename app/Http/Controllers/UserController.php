<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users')->with('users', $users);
    }

    public function adduserform()
    {
        $user=new User();
        $plans=Plan::all()->pluck('plan_name', 'id');
        return View::make('adduser')->with('plans',$plans)->with('user',$user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->firstname=$data['firstname'];
        $user->lastname=$data['lastname'];
        $user->email=$data['email'];
        $user->phone=$data['phone'];
        $user->save();
        foreach ($data['plans'] as $plan):
            DB::table('user_plans')->insert(
                ['user_id' => $user->id, 'plan_id' => $plan]
            );
        endforeach;
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('showuser')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return  redirect('users');
    }
}
