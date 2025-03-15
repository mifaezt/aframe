<!-- Подключаем шаблон -->
@extends('layouts.main')

<!-- Заголовок страницы -->
@section('title', 'Личный кабинет')

@section('content')
<div class="container">
    <div class="cabinetContainer">
        <section class="profile-section">
            <!-- Заголовок -->
            <h1 class="profile-title">Личный кабинет</h1>
            <h2 class="welcome-message">Добро пожаловать, {{ auth()->user()->name }}!</h2>

            <!-- Кнопка брони -->
            <a href="{{ route('bookings.create') }}" class="button-link">ЗАБРОНИРОВАТЬ</a>
            
              <!-- Кнопка панели администрирования -->
              @if(auth()->user()->role_id === 1)
                    <a href="{{ route('voyager.dashboard') }}" class="admin-panel-button">Панель администрирования</a>
                @endif

            <!-- Информация о профиле -->
            <div class="profile-info">
                <h2>Мой профиль</h2>
                <p><strong>Имя:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Телефон:</strong> {{ auth()->user()->phone ?? 'Не указан' }}</p>
                
                <h3>Возникли вопросы? Хотите отменить бронь? Свяжитесь с нами! <a href="{{ route('home') }}#contacts" class="admin-panel-button">Контакты</a></h3>
                <a href="{{ route('logout') }}" class="logout-button">Выйти</a>
              
            </div>

            <!-- Список бронирований -->
            <div class="bookings-list">
                <h2>Мои бронирования</h2>
                @forelse(auth()->user()->bookings->reverse() as $booking)
                    <ul>
                        <li class="booking-item">
                            <p><strong>Бронирование с</strong> {{ $booking->start_date }} <strong>по</strong> {{ $booking->end_date }}</p>
                            <!-- <p><strong>Стоимость:</strong> {{ $booking->total_price }} руб.</p> -->
                        </li>
                    </ul>
                @empty
                    <p class="no-bookings">Пока бронирований нет.</p>
                @endforelse
            </div>
        </section>

        <!-- Секция с фото -->
        <section class="profile-image-section">
            <img src="{{ asset('images/buckground.jpg') }}" alt="Домик у озера" class="profile-image">
        </section>
    </div>
</div>
@endsection