<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Добавление новости</title>

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
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        <div>
            <label for="title">Заголовок</label>
            <p><input type="text" id="title" name="title"></p>
        </div>
        <div>
            <label for="preview">Анонс новости</label>
            <p><input type="text" style="width: 400px; height: 200px;" id="preview" name="preview"></p>

        </div>
        <div>
            <label for="text">Текст новости</label>
            <p><input type="text" style="width: 400px; height: 200px;" id="text" name="text"></p>

        </div>
        <div>
            <input type="file" accept="image/jpeg,image/gif" name="image">
        </div>

        <input type="submit" value="Сохранить" />
    </form>
</div>

</body>
</html>

