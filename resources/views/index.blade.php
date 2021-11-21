<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>COACHTECH</title>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        @if (count($errors) > 0)
            <ul>
                <li>The content field is required.</li>
            </ul>
        @endif
        <form class="type_tasks" action="/todo/create" method="POST">
        @csrf
            <input class="textbox new_textbox" type="text" name="content">
            <button class="btn btn_add">追加</button>
        </form>
        <div class="lists">
            <table>
                <thead>
                    <tr class="list_titles">
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                </thead>
                @foreach ($tasks as $task)
                <tbody>
                    <tr class="list">
                        <td class="date">{{ $task->created_at }}</td>
                        <form action="/todo/update/{{ $task->id }}" method="POST">
                            @csrf
                            {{-- 取得したデータをinputのテキストボックスの中に入れて表示させる --}}
                            <td><input type="text" class="textbox listed_textbox" name="content" value="{{ $task->content }}"></td>
                            <td>
                                <button class="btn btn_update">更新</button>
                            </td>
                        </form>
                        <form action="/todo/delete/{{ $task->id }}"  method="POST">
                            @csrf
                            {{-- type="hidden"で非表示にする --}}
                            <td><input type="hidden" class="textbox listed_textbox" name="content" value="{{ $task->content }}"></td>
                            <td>
                                <button class="btn btn_delete">削除</button>
                            </td>
                        </form>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
