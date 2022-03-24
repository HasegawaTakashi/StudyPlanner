<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListMemo</title>
</head>

<body>
    <h1>listMemo</h1>
    <p>listMemoのテストページです</p>

    <form method="POST" action="{{ route('store', ['user_id' => $memos->user_id]) }}">
        @csrf
        @foreach ($memos as $memo)
            <p>{{ $memos->user_id }}</p>
            <div class="form-group">
                <ul>
                    <li class="form-control" name="title" value="{{ $memos->title }}">タイトル: {{ $memos->title }}</li>
                    <li class="form-control" name="memo" value="{{ $memos->memo }}">メモ: {{ $memos->memo }}</li>
                </ul>
            </div>
        @endforeach
        <a href="{{ route('dashboard') }}" class="btn">戻る</a>
    </form>
</body>

</html>
