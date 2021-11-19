<?php

namespace App\Http\Controllers;

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

        $tasks = $request->all();
        $tasks = Task::create(['content' => $request->content]);
        // dd($tasks);
        return redirect('/');
    }

    public function update(TodoRequest $request)
    {
        $this->validate($request, Task::$validation);

        $tasks = $request->all();
        unset($tasks['_token']);


        // 重複がなかったらupdate
        // $updatedTask = Task::where('content', $request->content)->first();
        // if ($updatedTask !== null) {
        //     Task::where('content', $request->content)->update($updatedTask);
        // }
        // $updatedTask = Task::where('content', $request->content)->first();

        // 同じデータが全て更新されないようにfirstしてからupdate
        // $updatedTask = Task::where('content', $request->content)->update($updatedTask);
        // if ($updatedTask = Task::where('content', $request->content)->first()) {
        //     $updatedTask->update($updatedTask);
        // }

        Task::where('id', $request->id)->update($tasks);

        // dd($tasks);
        return view('update', ['tasks' => $tasks]);

        // Task::where('content', $request->content)->first();
        // Task::where('content', $request->content)->update($tasks);
        // dd($tasks)->toArray();
        // return view('update', ['tasks' => $tasks]);
    }

    public function delete(TodoRequest $request)
    {
        $deletedTask = new Task;
        // $tasks = Task::find($request->content)->delete();
        if ($deletedTask::find($request->content)->first()) {
            Task::find($request->content)->delete($deletedTask);
        }
        return redirect('/');
    }
}