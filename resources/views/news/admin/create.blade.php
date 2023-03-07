@extends('layouts.main-news')

@section('title', 'Добавление новости')

@section('content')

    @include('news.admin.show-errors')

    <div class="edit-news-form">
        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">

            @include('news.admin.form-fields')

            <div class="btn btn-save-news">
                <input type="submit" value="Сохранить" />
            </div>
        </form>
    </div>
@endsection
