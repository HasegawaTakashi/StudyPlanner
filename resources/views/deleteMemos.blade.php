<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteMemo</title>
</head>
<body>
    <h1>Memo</h1>
    <p>DeleteMemoのテストページです</p>
    <p>本当に削除しますか？</p>
    <button>yes</button>
    <button class="btn"><a href="{{ route('memo.list') }}">no</a></button>
</body>

</html>
