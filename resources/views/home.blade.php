<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>なんでも学習帳: ホーム</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
  <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse hidden" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('memo.create') }}">メモ新規作成</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('memo.list') }}">メモ一覧表示</a>
          </li>
          <li class="nav-item">
            <form class="nav-link active" aria-current="page" method="POST" action="{{ route('logout') }}">
                @csrf
                <nav-link :href="route('logout')" onclick="event.preventDefault();
                  this.closest('form').submit();">
                  ログアウト
                  </nav-link>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="m-3">
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
            <h1><span class="bg-light">メモはありません</span></h1>
    @else
      <div style="height: 100vh">
        <div class="bg-light p-3 m-3">
          <h1>{{ $memos->first()->title }}</h1>
        </div>
        <div class="h-50 bg-light p-3 m-3">
          <h2>{{ $memos->first()->memo }}</h2>
        </div>
      </div>
      <div class="h-auto">
      </div>
    @endif
  </div>
</body>
</html>
