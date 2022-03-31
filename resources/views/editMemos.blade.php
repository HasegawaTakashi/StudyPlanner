<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateMemo</title>
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

    <form method="" action="">
        @csrf
        @if ($is_memo_count_zero === false)
            <p>メモはありません</p>
        @else
            @foreach ($memos as $memo)
                <p>user:{{ $memo->user_id }}</p>
                <p>id:{{ $memo->id }}</p>
                <div>
                    <ul>
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="メモ">{{ $memo->memo }}</textarea>
                        </div>
                        <button type="submit" class="btn">編集</button>
                    </ul>
                </div>
            @endforeach
        @endif
        <button><a href="{{ route('dashboard') }}" class="btn">戻る</a></button>
    </form>
</body>

</html>
