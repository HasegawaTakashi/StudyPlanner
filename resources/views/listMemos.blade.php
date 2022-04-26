<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
    <title>ListMemo</title>
</head>

<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="m-3">
        <h1 class="my-4">ListMemo</h1>
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
                <div class="my-3">
                    <ul class="list-unstyled">
                        <li class="p-1 my-3 bg-light" name="title">タイトル: {{ $memo->title }}</li>
                        <li class="p-1 my-3 bg-light" name="memo">メモ: {{ $memo->memo }}</li>
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="text-right">
                        <button class="btn btn-info mx-2">
                            <a href="{{ route('memo.edit', $memo->id) }}">編集</a>
                        </button>
                        <button class="btn btn-danger opacity-75">
                            <a href="{{ route('memo.delete', $memo->id) }}">削除</a>
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="d-flex justify-content-end">
            <button class="my-3 btn-sm btn btn-success opacity-75"><a href="{{ route('home') }}" class="btn">戻る</a></button>
        </div>
    </div>
</body>

</html>
