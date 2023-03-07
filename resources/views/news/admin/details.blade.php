@extends('layouts.main-news')

@section('title', $news->title)

@section('content')

    <div class="news">
        <h1>{{ $news->date }} — {{ $news->title }}</h1>

        @if($news->image !== null)
            <div><img src="{{ $news->image }}" alt="Картинка новости"></div>
        @endif
        <div class="news-text">{{ $news->text }}</div>
    </div>

    <div class="button-news-details">
        <div>
            <a class="btn" href="{{ route('news.edit', ['news' => $news->id]) }}">Редактировать</a>
        </div>
        <div>
            <form action="{{ route('news.destroy',['news' => $news->id]) }}" method="post">

                <input name="_method" type="hidden" value="DELETE">

                <input class="btn" type="submit" value="Удалить" />
            </form>
        </div>
    </div>
@endsection

