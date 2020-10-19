<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

          public function destroy(todo $todo) {
            $todo->delete();
           return redirect('/');
         }

         public function store(Request $request) {
            $todo = new Todo();
            $todo->body = $request->body;
            $todo->save();
            return redirect('/');
        }
        public function edit(todo $todo) {
            return view('todos.edit')->with('todo',$todo);
          }
          public function update(Request $request,todo $todo) {
            $todo->body = $request->body;
            $todo->save();
            return redirect('/');
          }
}


