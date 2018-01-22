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
        $plans = Plan::orderBy('id','desc')->get();
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
        return redirect('plans');
        /*$html = view('planli')->with(compact('plan'))->render();
        return response()->json(['success' => true, 'html' => $html]);*/
       /* $view = View::make('planli', ['plan' => $plan]);
        $contents = $view->render();
        return $contents;*/
        //return response()->json($plan);
        /*$contents = View::make('planli')->with('plan',$plan);
        $response = Response::make($contents,);
        $response->header('Content-Type', 'text/plain');
        return $response;*/
        //return response()->json($request);
        //return View::make('planli')->with('plan',$plan);
        /*if ($request->isMethod('post')){
            return response()->json(['response' => $plan]);
        }

        return response()->json(['response' => 'This is get method']);*/
    }

    public function planli($id)
    {
        $plan=Plan::find($id);
        return View::make('planli')->with('plan',$plan);
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
        $plan=Plan::find($id);
        $difficulty_levels=DifficultyLevel::all();
        $def_exercises=Exercise::orderBy('id','asc')->get();
        return view('editplan')->with('plan', $plan)->with('difficulty_levels',$difficulty_levels)->with('def_exercises',$def_exercises);

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
        $data = $request->all();
        $plan=Plan::find($id);
        $plan->plan_name=$data['plan_name'];
        $plan->plan_description=$data['plan_description'];
        $plan->plan_difficulty=$data['plan_difficulty'];
        $plan->save();
        $days= PlanDay::where('plan_id',$plan->id)->get();
        foreach($days as $day):
            $exercises=ExerciseInstance::where('day_id',$day->id)->get();
            foreach ($exercises as $exercise):
                $exercise->delete();
            endforeach;
            $day->delete;
        endforeach;
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
        return redirect('plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $plan=Plan::find($id);
        $days=$plan->days;
        foreach ($days as $day):
            $exercises=$day->exerciseInstances;
            foreach ($exercises as $exercise):
                $exercise->delete();
            endforeach;
            $day->delete();
        endforeach;
        $plan->delete();

        return  redirect('plans');

    }
}
