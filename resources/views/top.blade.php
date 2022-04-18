<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>Top(bootstrap)</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
  <nav class="navbar navbar-expand-lg navbar-light list-unstyled my-3">
      <div class="collapse navbar-collapse" id="navbarNav">
        @auth
          <ul class="navbar-nav">
            <li class="nav-item">
              <button type="button" class="btn btn-secondary">
                <a class="nav-link active text-light" aria-current="page" href="{{ url('/dashboard') }}">ホーム</a>
              </button>
            </li>
          @else
            <li class="nav-item">
              <button type="button" class="btn btn-secondary">
                <a class="nav-link text-light" href="{{ route('login') }}">ログイン</a>
              </button>
            </li>
            @if (Route::has('register'))
            <li class="nav-item ms-3">
              <button type="button" class="btn btn-secondary">
                <a class="nav-link text-light" href="{{ route('register') }}">新規登録</a>
              </button>
            </li>
          </ul>
          @endif
        @endauth
      </div>
  </nav>

  <div class="card">
    <div class="card-header text-center p-5">
      <h1>なんでも学習帳</h1>
    </div>
    <div class="card-body p-5">
      <h2 class="card-text text-center">
        なんでも書ける、そんな学習帳です
      </h2>
    </div>
  </div>
</body>
</html>
