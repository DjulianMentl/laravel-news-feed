<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $news->title }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form method="POST" action="{{ route('news.update',  ['news' => $news->id]) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Заголовок</label>
                <p><textarea id="title" name="title" rows="2" cols="50">{{ $news->title }}</textarea></p>
            </div>
            <div>
                <label for="preview">Анонс новости</label>
                <p><textarea id="preview" name="preview" rows="10" cols="50">{{ $news->preview }}</textarea></p>
            </div>
            <div>
                <label for="text">Текст новости</label>
                <p><textarea id="text" name="text" rows="20" cols="50">{{ $news->text }}</textarea></p>
            </div>
            <div>
                <input type="file" accept="image/jpeg,image/gif" name="image">
            </div>

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

</body>

</html>

