@extends('layouts.main-news')

@section('title', $news->title)

@section('content')

<h1>{{ $news->date }} — {{ $news->title }}</h1>
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
@endsection

