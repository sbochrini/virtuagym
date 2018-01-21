<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\PlanDay;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Plan;
use App\DifficultyLevel;
use Illuminate\Support\Facades\View;
use App\ExerciseInstance;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('index')->with('plans', $plans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'plan_name' => 'required',
//            'plan_description' => 'required',
//            'plan_difficulty' => 'required',
//            'day.exercises.exercise_id' => 'required',
//            'day.exercises.exercise_duration' => 'required',
//        ]);
        $data = $request->all();
        $plan=new Plan();
        $plan->plan_name=$data['plan_name'];
        $plan->plan_description=$data['plan_description'];
        $plan->plan_difficulty=$data['plan_difficulty'];
        $plan->save();
        foreach ($data['day'] as $d):
            $day= new PlanDay();
            $day->plan_id=$plan->id;
            $day->day_name=$d['day_name'];
            $day->order=$d['day_order'];
            $day->save();
            foreach ($d['exercises'] as $e):
                $exercise= new ExerciseInstance();
                $exercise->exercise_id= $e['exercise_id'];
                $exercise->day_id=$day->id;
                $exercise->order=$e['exercise_order'];
                $exercise->exercise_duration=$e['exercise_duration'];
                $exercise->save();
            endforeach;
        endforeach;
        /*$contents = View::make('planli')->with('plan',$plan);
        $response = Response::make($contents,);
        $response->header('Content-Type', 'text/plain');
        return $response;*/
        //return response()->json($request);
        return View::make('planli')->with('plan',$plan);
        /*if ($request->isMethod('post')){
            return response()->json(['response' => $plan]);
        }

        return response()->json(['response' => 'This is get method']);*/
    }

    public function planli()
    {
        return View::make('planli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        return view('showplan')->with('plan', $plan);
    }

    public function addplanform()
    {
        $difficulty_levels=DifficultyLevel::orderBy('id', 'asc')->get();
        return View::make('addplan')->with('difficulty_levels',$difficulty_levels);
    }

    public function addplanday(Request $request)
    {
        $exercises=Exercise::all();
        $count_day=$request->count_day;
        if(!isset($request->count_exercise)){
            return View::make('addplanday')->with('count_day',$count_day)->with('exercises',$exercises);
        }else{
            $count_exercise=$request->count_exercise;
            return View::make('addplanday')->with('count_day',$count_day)->with('count_exercise',$count_exercise)->with('exercises',$exercises);
        }


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
    public function destroy($id)
    {
        //
    }
}
