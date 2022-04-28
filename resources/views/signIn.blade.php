<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>なんでも学習帳 ログイン</title>
</head>

<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 m-3">
      <h1 class="fw-bold">ログイン</h1>
      @if(count($errors) >0)
        <div class="alert alert-danger">
        <ul class="my-3">
            @foreach ($errors->all() as $error)
            <li class="list-unstyled fw-bold">{{ $error }}</li>
            @endforeach
        </ul>
        </div>
      @endif
      <form action="{{ route('memo.signIn') }}" method="post" class="m-3">
        @csrf
        <div class="form-group">
          <label for="email"><p class="fw-bold">メールアドレス</p></label>
          <input type="text" id="email" name="email" class="form-control" placeholder="メールアドレス"  autofocus required>
        </div>
        <div class="form-group my-3">
          <label for="password"><p class="fw-bold">パスワード</p></label>
          <input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required>
        </div>
        <div class="row justify-content-end">
          <button type="submit" class="btn btn-primary my-3 col-4">ログイン</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
