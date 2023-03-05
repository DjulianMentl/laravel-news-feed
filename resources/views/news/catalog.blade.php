@extends('layouts.main-news')

@section('title', $title)

@section('content')
    <h1>Список новостей</h1>

    <div>
        @foreach($newsList as $news)
            <a href="{{ route('show-news', ['id' => $news->id]) }}"><h3>{{ $news->date }} — {{ $news->title }}</h3></a>
            <din>{{ $news->preview }}</din>
            <hr>
        @endforeach

        <div">{{ $newsList->links() }}</div>
    </div>
@endsection
