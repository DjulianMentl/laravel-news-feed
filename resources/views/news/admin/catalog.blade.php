@extends('layouts.main-news')

@section('title', $title)

@section('content')
    <h1>Список новостей</h1>

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
@endsection
