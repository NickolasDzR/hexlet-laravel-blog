@extends('layouts.app')

@section('content')
    {{  html()->form('GET', route('articles.index'))->open() }}
        {{  html()->input('text', 'q', $name)->value($name ?? '') }}
        {{  html()->submit('Search') }}
    {{ html()->form()->close() }}

    <h1>Список статей</h1>
    @foreach($articles as $article)
        <h2>{{ $article->name }}</h2>
        <p>{{ $article->body }}</p>
        <a href="{{ route('articles.edit', $article) }}">Редактирование статьи #{{ $article->name }}</a>
        <br>
        <a href="{{ route('articles.show', $article->id) }}">Статья {{ $article->id }}</a>
    @endforeach
@endsection
