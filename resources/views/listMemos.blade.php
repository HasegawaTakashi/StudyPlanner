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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($does_memo_exists === false)
            <p>メモはありません</p>
    @else
        @foreach ($memos as $memo)
            <p>{{ $memo->user_id }}</p>
            <div>
                <ul>
                    <li name="title">タイトル: {{ $memo->title }}</li>
                    <li name="memo">メモ: {{ $memo->memo }}</li>
                </ul>
            </div>
            <a href="{{ route('memo.edit', $memo->id) }}">
                編集
            </a>
        @endforeach
    @endif
    <button><a href="{{ route('dashboard') }}" class="btn">戻る</a></button>
</body>

</html>
