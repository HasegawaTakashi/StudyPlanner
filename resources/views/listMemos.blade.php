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
        @csrf
        @foreach ($memos as $memo)
            <p>{{ $memo->user_id }}</p>
            <div>
                <ul>
                    <li name="title" value="{{ $memo->title }}">タイトル: {{ $memo->title }}</li>
                    <li name="memo" value="{{ $memo->memo }}">メモ: {{ $memo->memo }}</li>
                </ul>
            </div>
        @endforeach
        <a href="{{ route('dashboard') }}" class="btn">戻る</a>
</body>

</html>
