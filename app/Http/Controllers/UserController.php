<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Concerns\InteractsWithFlashData;

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
        $user=User::find($id);
        $user_plans=DB::table('user_plans')
            ->select('*')
            ->whereRaw('user_id = :id',[ 'id' => $id] )
            ->get();
        $plans=Plan::all()->pluck('plan_name', 'id');
        //return $plans;
        return view('edituser')->with('user', $user)->with('user_plans',$user_plans)->with('plans',$plans);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user_plans=DB::table('user_plans')
            ->select('*')
            ->whereRaw('user_id = :id',[ 'id' => $id] )
            ->delete();
        $input_plans=Input::get('plans');
        if(count($input_plans)>0){
            foreach ($input_plans as $plan):
                DB::table('user_plans')->insert(
                    ['user_id' => $user->id, 'plan_id' => $plan]
                );
            endforeach;
        }else{
            DB::table('user_plans')->insert(
                ['user_id' => $user->id, 'plan_id' => $input_plans]
            );
        }
        $user->save();

        $request->session()->flash('message', 'Successfully updated nerd!');
        return redirect('users');
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
        DB::table('user_plans')
            ->select('*')
            ->whereRaw('user_id = :id',[ 'id' => $id] )
            ->delete();

        return  redirect('users');
    }
}
