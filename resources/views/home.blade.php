<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>home</title>
</head>
<body>
  <p>home test</p>
  <div class="mt-3 space-y-1">
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button>logout</button>
      </form>
  </div>
</body>
</html>
