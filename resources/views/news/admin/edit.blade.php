@extends('layouts.main-news')

@section('title', $news->title)

@section('content')

    @include('news.admin.show-errors')

    <div>
        <form method="POST" action="{{ route('news.update',  ['news' => $news->id]) }}" enctype="multipart/form-data">

            @include('news.admin.form-fields')

            <input type="hidden" name="_method" value="PATCH">
            <button class="btn btn-save-news" type="submit">Сохранить</button>
        </form>
    </div>


@endsection
