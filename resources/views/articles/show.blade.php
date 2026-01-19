@extends('layouts.app')

@section('content')
    <h1>{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
    <br>
    <br>
    <h2>Комментарии:</h2>
@endsection
