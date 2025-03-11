<!-- Подключаем шаблон (шапка)-->
@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Админ')

@section('content')

<form action="{{ route('news.store') }}" method="POST">
       @csrf
       <div>
           <label for="title">Заголовок</label>
           <input type="text" name="title" required>
       </div>
       <div>
           <label for="content">Содержимое</label>
           <textarea name="content" required></textarea>
       </div>
       <button type="submit">Добавить новость</button>
   </form>
   

@endsection