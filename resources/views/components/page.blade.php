@props(['title'])

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} — Новости колледжа</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    {{ $slot }}
</body>
</html>
