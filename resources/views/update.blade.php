<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>COACHTECH</title>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form class="type_tasks" action="/todo/create" method="POST">
        @csrf
            <input class="textbox new_textbox" type="text" name="content">
            <button class="btn btn_add">追加</button>
        </form>
        <div class="lists">
            <table>
                <tr class="list_titles">
                    <th>作成日</th>
                    <th>タスク名</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                @foreach ($tasks as $task)
                <tr class="list">
                    <td class="date">{{ $task->created_at }}</td>
                    <form action="/todo/update" method="POST">
                        @csrf
                        {{-- 取得したデータをinputのテキストボックスの中に入れて表示させる --}}
                        <td><input type="text" name="content" value="{{ $task->content }}"></td>
                        <td>
                            <button class="btn btn_update">更新</button>
                        </td>
                    </form>
                    <form action="/todo/delete" method="POST">
                        @csrf
                        {{-- type="hidden"で非表示にする --}}
                        <td><input type="hidden" name="content" value="{{ $task->content }}"></td>
                        <td>
                            <button class="btn btn_delete">追加</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
{{-- @extends('index') --}}
