<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>Top(bootstrap)</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
  <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse hidden" id="navbarNav">
        <ul class="navbar-nav">
          @if (Route::has('login'))
            @auth
              <li class="nav-item m-1">
                <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">ホーム</a>
              </li>
              @else
                <li class="nav-item m-1">
                  <a class="nav-link" href="{{ route('login') }}">ログイン
                  </a>
                </li>
                @if (Route::has('register'))
                  <li class="nav-item m-1">
                    <a class="nav-link" href="{{ route('register') }}">新規登録
                    </a>
                  </li>
              @endif
            @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="card">
    <div class="card-header text-center py-4">
      <h1>なんでも学習帳</h1>
    </div>
    <div class="card-body p-5">
      <h2 class="card-text text-center">
        なんでも書ける、そんな学習帳です。
      </h2>
    </div>
  </div>
</body>
</html>
