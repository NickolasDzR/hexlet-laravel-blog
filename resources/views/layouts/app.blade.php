<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexlet Blog - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    @vite(['resources/js/app.js', 'css/app.css'])
</head>
<body>
<div class="container mt-4">
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item">
                <a class="nav__link" href="{{ route('articles.index') }}">Статьи</a>
                <a class="nav__link" href="{{ route('articles.create') }}">Создание статей</a>
            </li>
        </ul>
    </nav>
    <h1>@yield('header')</h1>
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>
