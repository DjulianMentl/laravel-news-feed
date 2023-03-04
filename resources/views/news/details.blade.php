<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $news->title }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
</head>

<body>
<h1>{{ $news->data }} — {{ $news->title }}</h1>
@if($news->image !== null)
    <div><img src="{{ $news->image }}" alt="Картинка новости"></div>
@endif
<div>{{ $news->text }}</div>
</body>

</html>

