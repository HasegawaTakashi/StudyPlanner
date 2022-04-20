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
  <nav class="navbar navbar-expand-lg navbar-light list-unstyled container-fluid my-3">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="container">
        <div class="row">
          @auth
              <div class="col-2">
                    <button type="button" class="btn btn-secondary">
                      <a class="nav-link active text-light" aria-current="page" href="{{ url('/dashboard') }}">ホーム</a>
                    </button>
              </div>
            @else
              <div class="col-2">
                  <button type="button" class="btn btn-secondary">
                    <a class="nav-link text-light" href="{{ route('login') }}">ログイン</a>
                  </button>
              </div>
            @if (Route::has('register'))
            <div class="col-2 ms-3">
                  <button type="button" class="btn btn-secondary">
                    <a class="nav-link text-light" href="{{ route('register') }}">新規登録</a>
                  </button>
            </div>
            @endif
          @endauth
        </div>
      </div>
    </div>
  </nav>
  <div class="card">
    <div class="card-header text-center py-4">
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
