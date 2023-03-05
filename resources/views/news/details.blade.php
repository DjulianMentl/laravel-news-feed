@extends('layouts.main-news')

@section('title', $news->title)

@section('content')

    <h1>{{ $news->date }} — {{ $news->title }}</h1>
    @if($news->image !== null)
        <div><img src="{{ $news->image }}" alt="Картинка новости"></div>
    @endif
    <div>{{ $news->text }}</div>

@endsection
