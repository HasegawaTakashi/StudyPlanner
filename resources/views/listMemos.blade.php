<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListMemo</title>
</head>

<body>
    <h1>ListMemo</h1>
    <p>ListMemoのテストページです</p>
    @if ($is_memo_count_zero === false)
            <p>メモはありません</p>
    @else
        @foreach ($memos as $memo)
            <p>{{ $memo->user_id }}</p>
            <div>
                <ul>
                    <li name="title" value="{{ $memo->title }}">タイトル: {{ $memo->title }}</li>
                    <li name="memo" value="{{ $memo->memo }}">メモ: {{ $memo->memo }}</li>
                </ul>
            </div>
        @endforeach
    @endif
    <a href="{{ route('dashboard') }}" class="btn">戻る</a>
</body>

</html>
