<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>メモ削除</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="m-3">
        <h1>メモ削除</h1>
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
            <div class="my-3">
                <ul class="list-unstyled text-black">
                    <li class="bg-light fw-bold p-1 my-3">タイトル: {{ $memo->title }}</li>
                    <li class="bg-light fw-bold p-1 my-3">メモ: {{ $memo->memo }}</li>
                </ul>
            </div>
        @endif
    </div>
    <div class="my-5 mx-3">
        <h2 class="fw-bold"><span class="text-danger">上記のメモを削除しますか？</span></h2>
        <div class="m-3">
            <button class="btn btn-danger opacity-75 mx-3"><a href="{{ route('memo.destroy', $memo->id) }}" class="text-black">はい</a></button>
            <button class="btn btn-success opacity-75 mx-3"><a href="{{ route('memo.list') }}" class="text-black">いいえ</a></button>
        </div>
    </div>
</body>
</html>
