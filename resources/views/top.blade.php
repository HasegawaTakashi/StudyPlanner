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
<body style="background-color:#BFDBFE; --bg-opacity: 1; opacity: 0.4">
  <div>
    @auth
      <a href="{{ url('/dashboard') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">ログイン</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}">新規登録</a>
        @endif
      @endauth
  </div>
</body>
</html>
