<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
</head>

<body>
    <div class="container">
        <div class="card">
            <p class="title">Todo List</p>
            {{-- <p>{{$txt}}</p> --}}
                @if (count($errors) > 0)
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                @endif
            <form action="/todo/create" method="post" class="flex between mb-30">
                @csrf
            <input type="text" class="input-add" name="{{old('content')}}" />
            <input class="button-add" type="submit" value="追加" />
            </form>
            <table>
                <tr>
                    <th>作成日</th>
                    <th>タスク名</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                <td>
                </td>
                <form action="/todo/update" method="post">
                    @csrf
                    <input type="hidden" name="_token" value="" />
                    <td>
                        <input type="text" class="input-update" value="" name="content" />
                    </td>
                    <td>
                        <button class="button-update">更新</button>
                    </td>
                </form>
                <td>
                    <form action="/todo/delete" mathod="post">
                        @csrf
                        <input type="hidden" name="_token" value="">
                        <button class="button-delete">削除</button>
                    </form>
                </td>
            </table>
        </div>
    </div>


</body>

</html>
