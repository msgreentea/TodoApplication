<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        // 一覧を表示
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    public function create(TodoRequest $request)
    {
        // Modelに記述したvalidationを持ってくる。
        $this->validate($request, Task::$validation);

        $tasks = $request->all();
        $tasks = Task::create(['content' => $request->content]);
        // dd($tasks);
        return redirect('/');
    }

    public function update(TodoRequest $request, $id)
    {
        $this->validate($request, Task::$validation);
        $tasks = Task::find($id);
        $tasks = $request->all();
        unset($tasks['_token']);
        Task::where('id', $request->id)->update($tasks);

        // dd($tasks);
        return redirect('/');
    }

    public function delete(TodoRequest $request, $id)
    {
        $tasks = Task::find($id);
        Task::find($request->id)->delete();
        return redirect('/');
    }
}