<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Список новостей</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

</head>
<body>
<h1>Список новостей ADMIN</h1>
<div>
    @foreach($newsList as $news)
        <a href="{{ route('news.show', ['news' => $news->id]) }}"><h3>{{ $news->date }} — {{ $news->title }}</h3></a>
        <div>{{ $news->preview }}</div>
        <hr>
    @endforeach

    <div>
        <a href="{{ route('news.create') }}">Добавить новость</a>
    </div>

    <br> {{ $newsList->links() }}

</div>
</body>
</html>
