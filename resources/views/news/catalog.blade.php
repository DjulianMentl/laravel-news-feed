<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->

</head>
<body>
<h1>Список новостей</h1>
<div>
    <p>Время добавления последней новости: {{ $lastNews->date }}</p>
</div>
<div>
    @foreach($newsList as $news)
        <a href="{{ route('show-news', ['id' => $news->id]) }}"><h3>{{ $news->date }} — {{ $news->title }}</h3></a>
        <din>{{ $news->preview }}</din>
        <hr>
    @endforeach

    <br> {{ $newsList->links() }}

{{--        {{ route('show-news', ['news' => $news->id]) }}--}}
</div>
</body>
</html>
