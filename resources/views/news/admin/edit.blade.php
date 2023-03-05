@extends('layouts.main-news')

@section('title', $news->title)

@section('content')

    @include('news.admin.show-errors')

    <div>
        <form method="POST" action="{{ route('news.update',  ['news' => $news->id]) }}" enctype="multipart/form-data">

            @include('news.admin.form-fields')

            <input type="hidden" name="_method" value="PATCH">
            <button type="submit">Сохранить</button>
        </form>
    </div>

    <div>
        <form action="{{ route('news.destroy', ['news' => $news->id]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <input type="submit" value="Удалить" />
        </form>
    </div>
@endsection
