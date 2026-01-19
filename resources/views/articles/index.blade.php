@extends('layouts.app')

@section('content')
    <p>Поиск:</p>
    {{  html()->form('GET', route('articles.index'))->open() }}
        {{  html()->input('text', 'name', $name)->value($name ?? '') }}
        {{  html()->submit('Search') }}
    {{ html()->form()->close() }}

    <h1>Список статей</h1>

    @foreach($articles as $article)
        <h2>{{ $article->name }}</h2>
        <p>{{ $article->body }}</p>
        <a href="{{ route('articles.edit', $article) }}">Редактирование статьи {{ $article->name }}</a>
        <br>
        <a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить Статья {{ $article->name }}</a>
        <br>
        <a href="{{ route('articles.show', $article->id) }}">Статья {{ $article->id }}</a>
    @endforeach
@endsection
