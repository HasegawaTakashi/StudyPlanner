<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditMemo</title>
</head>
<body>
    <h1>Memo</h1>
    <p>EditMemoのテストページです</p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
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
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="メモ">{{ $memo->memo }}</textarea>
                </div>
                <button class="btn" type="submit">保存</button>
            </form>
        </ul>
    @endif
    <button class="btn"><a href="{{ route('dashboard') }}">戻る</a></button>
    </form>
</body>

</html>
