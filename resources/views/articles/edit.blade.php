@extends('layouts.app')

@section('content')
    {{ html()->modelForm($article, 'PATCH', route('articles.update', $article))->open() }}
    @include('forms.form', ['buttonText' => 'Обновить', 'buttonClass' => 'btn btn-primary'])
    {{ html()->closeModelForm() }}
@endsection
