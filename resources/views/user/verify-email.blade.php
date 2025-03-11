<!-- Вид сообщения -->
@extends('layouts.main') 

@section('title', 'Verify email')

@section('content')

    <div class="alert alert-info" role="alert">
        Спасибо за регистрацию! Ссылка на подтверждение аккаунта отправлена вам на электронную почту.
    </div>
    <div class="form-container">
        Не получили ссылку?
        <form method="post" action="{{route('verification.send')}}">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Отправить повторно</button>
        </form>
        <h3> Добро пожаловать {{auth()->user()->name}}</h3>
        <a href="{{route('logout')}}">Выйти</a>
    </div>
@endsection