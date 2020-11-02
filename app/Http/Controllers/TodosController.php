<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\User;
// use App\Auth;
use Illuminate\Support\Facades\Auth;


use Log;
use Carbon\Carbon;

class TodosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index() {
        $carbon = Carbon::now();
        $user_id = Auth::id();
        $results = Todo::with('user')->where('user_id', $user_id)->whereBetween('result_status', [2,3])->where('date','>=',$carbon)->orderBy('date', 'asc')->get();
        $todos = Todo::with('user')->where('user_id', $user_id)->where('result_status',1)->where('date','>=',$carbon)->orderBy('date', 'asc')->get();
        // $todos = Todo::with('user')->where('user_id', $user_id)->whereBetween('result_status', [2,3])->where('date','>=',$carbon)->orderBy('date', 'asc')->get();
        Log::debug(print_r($todos,true));
        // var_dump($todos);
        return view('todos.index')->with([
                'todos' => $todos,
                'results'=> $results]);
    }

    public function destroy(todo $todo) {
      $todo->delete();
      return redirect('/todos');
    }

    public function store(Request $request) {
      $user_id = Auth::id();
      Log::debug(print_r($request,true));

      $validator = $request->validate([       // <-- ここがバリデーション部分
        'body' => 'required',
        'company' => 'required',
        'interview_status' => 'required',
        'result_status' => 'required',
        'date' => 'required|date'
      ]);
      $todo = new Todo();
      $todo->body = $request->body;
      $todo->user_id = $user_id;
      $todo->company = $request->company;
      $todo->interview_status = $request->interview_status;
      $todo->date = $request->date;
      $todo->result_status = $request->result_status;
      $todo->save();
      return redirect('/todos');
    }
    public function edit(todo $todo) {
      return view('todos.edit')->with('todo',$todo);
    }
    public function update(Request $request,todo $todo) {
      $user_id = Auth::id();
      $validator = $request->validate([       // <-- ここがバリデーション部分
        'body' => 'required',
        'company' => 'required',
        'interview_status' => 'required',
        'result_status' => 'required',
        'date' => 'required|date'
      ]);
      $todo->body = $request->body;
      $todo->user_id = $user_id;
      $todo->company = $request->company;
      $todo->interview_status = $request->interview_status;
      $todo->date = $request->date;
      $todo->result_status = $request->result_status;
      $todo->save();
      return redirect('/todos');
    }
}


