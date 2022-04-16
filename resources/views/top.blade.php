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
    <div class="navbar d-flex justify-content-around">
      @auth
        <button type="button" class="btn btn-secondary  btn-lg">
          <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
        </button>
      @else
        <button type="button" class="btn btn-secondary btn-lg">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </button>
          @if (Route::has('register'))
          <button type="button" class="btn btn-secondary btn-lg">
            <a href="{{ route('register') }}" class="btn">新規登録</a>
          </button>
          @endif
      @endauth
    </div>

</body>
</html>
