<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = Todo::all();
        $items = DB::select('select * from todo');
        return view('todos.index',['items' => $items]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');

        $param = [
            'content' => $request->content,
        ];
        DB::insert('insert into todos (content) values (:content)', $param);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todo = Todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('delete', ['form' => $todo]);
    }
}
