@extends('layouts.app')

@section('content')
    {{ html()->modelForm($article, 'POST', route('articles.store'))->open()  }}
        @include('forms.form', ['buttonText' => 'Создать'])
    {{ html()->closeModelForm()  }}
@endsection
