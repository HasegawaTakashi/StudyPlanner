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
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container-fluid">
  <div class="d-flex justify-content-around">
    @auth
      <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn">ログイン</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="btn">新規登録</a>
        @endif
      @endauth
  </div>
  </div>
</body>
</html>
