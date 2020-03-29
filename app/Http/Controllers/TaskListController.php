<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\TaskList;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskList = TaskList::all();
        return view('home', ['taskList' => $taskList]);
    }

    public function listToday(){
        $today = Carbon::today()->toDateString();
        $rewards = TaskList::where('check', '=', 1)->where('reward_check', '=', 0)->get();
        $taskList = TaskList::whereDate('date', '=', $today)->get();
        return view('today', ['taskList' => $taskList, 'rewards' => $rewards]);
    }

    public function listByDate(Request $request){
        $date = $request->date;
        $taskList = TaskList::whereDate('date', '=', $date)->get();
        return view('home', ['taskList' => $taskList, 'day' => $date]);
    }

    public function checked(){
        $taskList = TaskList::where('check', '=', 1)->get();
        $rewards = TaskList::where('check', '=', 1)->where('reward_check', '=', 0)->get();
        return view('home', ['taskList' => $taskList, 'rewards' => $rewards]);
    }

    public function unchecked(){
        $taskList = TaskList::where('check', '<>', 1)->get();
        $rewards = TaskList::where('check', '=', 1)->where('reward_check', '=', 0)->get();
        return view('home', ['taskList' => $taskList, 'rewards' => $rewards]);
    }

    public function rewards(){
        $rewards = TaskList::where('check', '=', 1)->where('reward_check', '=', 0)->get();
        return view('rewards', ['rewards' => $rewards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->date);
        $date = $request->date;
        $taskList = TaskList::all();
        $data = ['title' => $request->title, 'description' => $request->description, 'reward' => $request->reward, 'date' => $date];
        DB::table('task_lists')->insert($data);
        return redirect()->route('home', ['taskList' => $taskList]);
        //return view('home', ['taskList' => $taskList]);
    }

    public function check($id){ 
        $task = TaskList::find($id);
        if($task->check == 0){
            $task->check = 1;
        }else{
            $task->check = 0;
        }
        $task->save();
        return back();
    }

    public function rewardcheck($id){
        $task = TaskList::find($id);
        if($task->reward_check == 0){
            $task->reward_check = 1;
        }
        $task->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = DB::table('task_lists')->find($id);
        return view('edittask', ['task' => $task]);
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
        $task = TaskList::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->reward = $request->reward;
        $task->date = $request->date;
        $task->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskList::destroy($id);
        return back();
    }
}
