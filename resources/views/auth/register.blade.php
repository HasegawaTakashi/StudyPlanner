<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>なんでも学習帳 アカウント新規登録</title>
</head>

<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 m-3">
            <h1 class="fw-bold">新規登録</h1>
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" class="m-3">
                @csrf
                <!-- Name -->
                <div class="form-group">
                    <label for="name"><p class="fw-bold">名前</p></label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"  placeholder="名前" required autofocus>
                </div>

                <!-- Email Address -->
                <div class="form-group my-3">
                    <label for="email"><p class="fw-bold">メールアドレス</p></label>
                    <input id="email" class="form-control" type="email" name="email" :value="{{ old('email') }}"  placeholder="メールアドレス" required>
                </div>

                <!-- Password -->
                <div class="form-group my-3">
                    <label for="password"><p class="fw-bold">パスワード</p></label>
                    <input id="password" class="form-control"             placeholder="パスワード"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password">
                </div>

                <!-- Confirm Password -->
                <div class="my-3">
                    <label for="password_confirmation"><p class="fw-bold">確認</p></label>
                    <input id="password_confirmation" class="form-control"
                                    placeholder="確認"
                                    type="password"
                                    name="password_confirmation" required>
                </div>

                <div class="flex justify-end mt-4">
                    <p>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </p>
                    <div class="row justify-content-end">
                        <button class="ml-4 btn btn-primary my-3 col-4">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
