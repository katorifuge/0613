<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        return view('todos.index',['txt' =>'フォームを入力']);
    }
    public function post(Request $request)
    {
        $validate_rule = [
            'content' =>'required｜numeric|between:0,20'
        ];
        $this->validate($request,$validate_rule);
        return view('todos.index',['txt'=>'正しい入力です']);
    }
}
