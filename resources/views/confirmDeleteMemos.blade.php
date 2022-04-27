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
        <div>
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
                <p>メモはありません</p>
            @else
                <p>title: {{ $memo->title }}</p>
                <p>memo: {{ $memo->memo }}</p>
            @endif
        </div>
    </div>
    <p>本当に削除しますか？</p>
    <button class="btn"><a href="{{ route('memo.destroy', $memo->id) }}">yes</a></button>
    <button class="btn"><a href="{{ route('memo.list') }}">no</a></button>
</body>

</html>
