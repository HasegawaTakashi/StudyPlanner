<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>なんでも学習帳 メモ編集</title>
</head>
<body style="background-color:#BFDBFE; --bg-opacity: 1; height: 100vh" class="container text-black-50">
    <div class="m-3">
        <h1>Memo</h1>
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
            <p>メモはありません</p>
        @else
            <ul>
                <form method="post" action="{{ route('memo.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="memo_id"></label>
                        <input type="hidden" class="form-control" id="memo_id" name="memo_id" value="{{ $memo->id }}">
                    </div>
                    <div class="form-group">
                        <label for="title"></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title }}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="メモ">{{ $memo->memo }}</textarea>
                    </div>
                    <button class="btn btn-primary my-3" type="submit">保存</button>
                </form>
            </ul>
        @endif
        <div class="d-flex justify-content-end">
            <button class="btn btn-success opacity-75"><a href="{{ route('home') }}" class="text-black">戻る</a></button>
        </div>
        </form>
    </div>
</body>

</html>
