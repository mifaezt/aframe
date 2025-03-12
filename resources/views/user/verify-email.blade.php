@extends('layouts.main')

@section('title', 'Verify email')

@section('content')
    <div class="container">
        <!-- Сообщение о регистрации -->
        <div class="alert alert-info" role="alert">
            Спасибо за регистрацию! Ссылка на подтверждение аккаунта отправлена вам на электронную почту.
        </div>

        <!-- Форма для повторной отправки ссылки -->
        <div class="form-container">
            <p>Не получили ссылку?</p>
            <form method="post" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="button-link">Отправить повторно</button>
            </form>

            <!-- Приветствие и кнопка выхода -->
            <h3 class="welcome-message">Добро пожаловать, {{ auth()->user()->name }}!</h3>
            <a href="{{ route('logout') }}" class="logout-link">Выйти</a>
        </div>
    </div>
@endsection