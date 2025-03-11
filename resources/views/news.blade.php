<!-- Подключаем шаблон (шапка)-->
@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Наши новости')

@section('content')
<h1>Наши новости</h1>
<div class="container">
    <h1>Все посты</h1>
        @foreach($news as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>Создано: {{ $post->created_at }}</small>
            <a href="{{ route('edit', $post->id) }}">Редактировать</a>
    
            <hr>
        </div>
    @endforeach

</div>
@endsection