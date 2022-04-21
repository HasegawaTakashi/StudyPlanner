<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1>ログイン</h1>
      @if(count($errors) >0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('memo.signIn') }}" method="post">
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">ログイン</button>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</body>
</html>
