<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
    <title>なんでも学習帳 メモ新規登録</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="my-3">
        <h1>Memo</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-3">
                @foreach ($errors->all() as $error)
                <li class="list-unstyled fw-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('memo.store') }}">
            @csrf
            <div class="form-group">
                <label for="title"></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="タイトル">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="メモ"></textarea>
            </div>
            <button type="submit" class="my-3 btn btn-sm btn-primary opacity-75">追加</button>
            <button class="my-3 btn-sm btn btn-success opacity-75">
                <a href="{{ route('home') }}" class="text-black">戻る</a>
            </button>
        </form>
    </div>
</body>

</html>
