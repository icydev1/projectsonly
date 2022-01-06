<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){

        $list = Todo::get();

        return view('todo-list',compact('list'));
    }

    public function create(Request $request){

        $addTodo = new Todo();
        $addTodo->todo_name = $request->text;
        $addTodo->save();
        return "done";

    }
    public function delete(Request $request ){
       $del =  Todo::where('id',$request->id)->delete();

        return "delete";

    }

    public function update(Request $request){

        $item = Todo::find($request->id);
        $item->todo_name = $request->update;
        $item->update();

        return $request->all();
    }
}
