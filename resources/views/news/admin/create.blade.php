@extends('layouts.main-news')

@section('title', 'Добавление новости')

@section('content')

    @include('news.admin.show-errors')

    <div>
        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">

            @include('news.admin.form-fields')

            <input type="submit" value="Сохранить" />
        </form>
    </div>
@endsection
