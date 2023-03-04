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
            <div>
                <label for="title">Заголовок</label>
                <p><input type="text" id="title" name="title" value="{{ $news->title }}"></p>
            </div>
            <div>
                <label for="preview">Анонс новости</label>
                <p><input type="text" style="width: 400px; height: 200px;" id="preview" name="preview" value="{{ $news->preview }}"></p>

            </div>
            <div>
                <label for="text">Текст новости</label>
                <p><input type="text" style="width: 400px; height: 200px;" id="text" name="text" value="{{ $news->text }}"></p>

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

            <input name="_method" type="hidden" value="DELETE">

            <input type="submit" value="Удалить" />
        </form>
    </div>

</body>

</html>

