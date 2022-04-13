<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListMemo</title>
</head>

<body>
    <h1>deletedMemosList</h1>
    <p>deletedListMemoのテストページです</p>
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
        @foreach ($trashed_memos as $memo)
            <p>{{ $memo->user_id }}</p>
            <div>
                <ul>
                    <li name="title">タイトル: {{ $memo->title }}</li>
                    <li name="memo">メモ: {{ $memo->memo }}</li>
                </ul>
            </div>
            <button>
                <a href="">復元する</a>
            </button>
            <button>
                <a href="">完全に削除する</a>
            </button>
        @endforeach
    @endif
    <button><a href="{{ route('dashboard') }}" class="btn">戻る</a></button>
</body>

</html>
