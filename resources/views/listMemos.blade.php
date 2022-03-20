<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListMemo</title>
</head>

<body>
    <h1>listMemo</h1>
    <p>listMemoのテストページです</p>

    <form method="POST" action="{{ route('store') }}">
        @csrf
        @foreach($memos as $memo)
            <p>{{ $memo->user_id }}</p>
            <div class="form-group">
                <textarea class="form-control" name="title" cols="25" rows="2" placeholder="タイトル">{{ $memo->title }}</textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="メモ">{{ $memo->memo }}</textarea>
            </div>
        @endforeach
        <a href="{{ route('dashboard') }}" class="btn">戻る</a>
    </form>
</body>

</html>
