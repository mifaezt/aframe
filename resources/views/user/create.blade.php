<!-- Подключаем шаблон -->
@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Регистрация')

@section('content')

<div class="container">
    <div class="form-container">
        <h2>Регистрация</h2>
        <form method='post' action='{{route("user.store")}}'>
            @csrf
            <div id="name" class="form-group">
                <input 
                    type="text" 
                    placeholder="Имя" 
                    name="name"
                    class="@error('name') is-invalid @enderror" 
                    required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input 
                    type="email" 
                    placeholder="Почта" 
                    name="email" 
                    class="@error('email') is-invalid @enderror" 
                    required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input 
                    type="tel" 
                    placeholder="Телефон" 
                    name="phone" 
                    class="@error('phone') is-invalid @enderror" 
                    required>
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input 
                    type="password" 
                    placeholder="Пароль" 
                    name="password"
                    id="password"
                    class="@error('password') is-invalid @enderror"  
                    required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input 
                    name="password_confirmation" 
                    type="password" 
                    id="password_confirmation" 
                    placeholder="Повторите пароль">
            </div>

            <div class="form-group">
                <button type="submit">Зарегистрироваться</button>
            </div>
            <div class="link">
                <a href="{{ route('login') }}">Уже зарегистрированы?</a>
                <a href="#">Политика конфиденциальности</a>
            </div>
        </form>
    </div>
</div>

@endsection