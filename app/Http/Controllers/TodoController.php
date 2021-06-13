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
        return view('todos.index',['items' => $items]);
    }
    public function find(Request $request)
    {
        return view('find',['input' =>'']);
    }
    public function search(Request $request)
    {
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Todo::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }
    public function add(Request $request)
    {
        return view('create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todos = new Todo;
        $form = $request->all();
        unset($form['_token_']);
        $todos->fill($form)->save();
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $todos = Todo::find($request->id);
        return view('edit', ['form' => $todos]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $todos = Todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todos->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $todos = Todo::find($request->id);
        return view('delete', ['form' => $todos]);
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
