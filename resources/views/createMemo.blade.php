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
    <p>CreateMemoのテストページです</p>

    <form>
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title">
            </div>
        <div class="form-group">
            <label for="memo">メモ</label>
            <input type="text" class="form-control" id="memo" name="memo">
            </div>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">戻る</a>
        <button type="submit" class="btn btn-success">追加</button>
        </form>
</body>

</html>
