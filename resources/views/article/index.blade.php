@extends('layouts.app')

@section('content')
    {{  html()->form('GET', route('articles.index'))->open() }}
    {{  html()->input('text', 'name', request('name', '')) }}
    {{  html()->submit('Search') }}
    {{  html()->form()->close() }}

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <h1>Список статей</h1>
    <ul class="article-list">
        @foreach($articles as $article)
            <li class="article-list__item">
                <h2>{{$article->name}}</h2>
                <div>{{Str::limit($article->body, 200)}}</div>
                <a href="{{ route('article.show', $article->id) }}"> Читать статью {{ $article->id }} </a>
                <br>
                <a href="{{ route('articles.edit', $article->id) }}">Редактировать статью {{ $article->id }}</a>
            </li>
        @endforeach
    </ul>

    <a href="..." data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
@endsection
