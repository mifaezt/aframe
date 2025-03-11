@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Новости')

@section('content')

    @foreach($posts as $post)
    
        <body>
    <div class="post-container">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-meta">
            <span class="post-date">Опубликовано: {{ $post->created_at->format('d.m.Y') }}</span>
        </div>
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
        <!-- clean для очистки от тегов, теги в voyager? -->
        <span class="post-content">{{ $post->clean_body }}</span>
    </div>
    @endforeach

@endsection