<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
</head>
<body>
    <div class="container">
        <header>
            @include('news.header')
        </header>
        <div>
            @yield(('content'))
        </div>
        <footer>
            @include('news.footer')
        </footer>
    </div>
</body>
</html>
