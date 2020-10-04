<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="/">ToDo App</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <li class="list-group-item list-group-item-action active list-group-item-dark">
                            フォルダ
                        </li>
                        <li class="list-group-item">
                            <button class="folder-btn btn-block">フォルダを追加する</button>
                        </li>
                        @foreach($folders as $folder)
                        <a href="{{route('tasks.index', ['id' => $folder->id])}}" class="list-group-item todo-list {{$current_folder_id === $folder->id ? 'folder-active' : '' }}">
                            {{$folder -> title}}
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="list-group">
                        <li class="list-group-item list-group-item-action active list-group-item-dark">
                            タスク
                        </li>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>タイトル</th>
                                    <th>状態</th>
                                    <th>期限</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->title}}</td>
                                    <td><span 
                                    class="badge {{$task->status_class}}">{{$task->status_label}}</span></td>
                                    <td>{{$task->formatted->due_date}}</td>
                                    <td><a href="">編集</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>