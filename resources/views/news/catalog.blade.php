@extends('layouts.main-news')

@section('title', $title)

@section('content')
    <div>
        @foreach($newsList as $news)
            <div class="news">
                <a href="{{ route('show-news', ['id' => $news->id]) }}"><h1>{{ $news->date }} — {{ $news->title }}</h1></a>
                <div class="news-preview">{{ $news->preview }}</div>
            </div>
        @endforeach

        <div class="pagination">{{ $newsList->links('news.pagination') }}</div>
    </div>
@endsection
