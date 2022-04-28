<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
    <title>なんでも学習帳 メモ一覧</title>
</head>

<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="m-3">
        <h1 class="my-4">メモ一覧</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-3">
                @foreach ($errors->all() as $error)
                <li class="list-unstyled fw-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if ($does_memo_exists === false)
            <h1><span class="bg-light fw-bold">メモはありません</span></h1>
        @else
            @foreach ($memos as $memo)
                <div class="my-3">
                    <ul class="list-unstyled text-black">
                        <li class="p-1 my-3 bg-light fw-bold" name="title">タイトル: {{ $memo->title }}</li>
                        <li class="p-1 my-3 bg-light fw-bold" name="memo">メモ: {{ $memo->memo }}</li>
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
        <div>
            {{ $memos->links() }}
        </div>
        <div class="d-flex justify-content-start">
            <button class="my-3 btn-sm btn btn-success opacity-75"><a href="{{ route('home') }}" class="btn">戻る</a></button>
        </div>
    </div>
</body>

</html>
