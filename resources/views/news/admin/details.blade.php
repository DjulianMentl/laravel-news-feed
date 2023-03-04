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
<h1>{{ $news->data }} — {{ $news->title }} - ADMIN</h1>
@if($news->image !== null)
    <div><img src="{{ $news->image }}" alt="Картинка новости"></div>
@endif
<div>{{ $news->text }}</div>

<div>
    <a href="{{ route('news.edit', ['news' => $news->id]) }}">Редактировать</a>
</div>

<form action="{{ route('news.destroy',['news' => $news->id]) }}" method="post">

    <input name="_method" type="hidden" value="DELETE">

    <input type="submit" value="Удалить" />
</form>

</body>

</html>

