<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        // 一覧で表示
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }
    public function create(TodoRequest $request)
    {
        // Modelに記述したvalidationを持ってくる。
        $this->validate($request, Task::$validation);
        $data = $request->all();
        $tasks = Task::create(['content' => $request->content]);
        // return redirect('/');
        $tasks = Task::all();
        return view('create', ['tasks' => $tasks]);
    }
    public function edit(TodoRequest $request)
    {
        $tasks = Task::find($request->content);
        return view('update', ['tasks' => $tasks]);
    }
    public function update(TodoRequest $request)
    {
        $this->validate($request, Task::$validation);
        $data = $request->all();
        unset($data['_token']);
        Task::where('content', $request->content)->update($data);
        // return redirect('/');
        // $tasks = Task::all();
        return view('update', ['tasks' => $tasks]);
    }
    public function delete(TodoRequest $request)
    {
        // $tasks = Task::find('content', $request->content);
        // $tasks = Task::find($request->content);
        $tasks = new Task;
        $tasks = Task::find($request->content)->delete();
        // $tasks->delete();
        return redirect('/');
        // $tasks = Task::all();
        // return redirect('index', ['tasks' => $tasks]);
    }
}