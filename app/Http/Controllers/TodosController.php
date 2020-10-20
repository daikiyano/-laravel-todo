<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Log;
use Carbon\Carbon;

class TodosController extends Controller
{
    public function index() {
        $carbon = Carbon::now();
        $todos = Todo::where('date','>=',$carbon)->orderBy('date', 'asc')->get();
        // ::all();
        Log::debug(print_r($todos,true));
        return view('todos.index')->with('todos',$todos);
    }

          public function destroy(todo $todo) {
            $todo->delete();
           return redirect('/');
         }

         public function store(Request $request) {
            Log::debug(print_r($request,true));
            $validator = $request->validate([       // <-- ここがバリデーション部分
                'body' => 'required',
                'company' => 'required',
                'interview_status' => 'required',
                'date' => 'required'
            ]);
            $todo = new Todo();
            $todo->body = $request->body;
            $todo->company = $request->company;
            $todo->interview_status = $request->interview_status;
            $todo->date = $request->date;
            $todo->result_status = $request->result_status;
            $todo->save();
            return redirect('/');
        }
        public function edit(todo $todo) {
            return view('todos.edit')->with('todo',$todo);
          }
          public function update(Request $request,todo $todo) {
            $todo->body = $request->body;
            $todo->company = $request->company;
            $todo->interview_status = $request->interview_status;
            $todo->date = $request->date;
            $todo->result_status = $request->result_status;
            $todo->save();
            return redirect('/');
          }
}


