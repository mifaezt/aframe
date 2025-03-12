@extends('layouts.main')

@section('title', 'О нас')

@section('content')
<section class="about-section container">
    <div class="book-container">
        <h1>Бронирование домика</h1>

        <!-- Список бронирований пользователя -->
        @if(auth()->check() && auth()->user()->bookings)
            <div>
                <h2>Мои бронирования</h2>
                <ul>
                    @foreach(auth()->user()->bookings as $booking)
                        <li>
                            C {{ $booking->start_date }} по {{ $booking->end_date }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>У вас пока нет бронирований.</p>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="start_date">Дата заезда</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Дата выезда</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Забронировать</button>
        </form>
    </div>
</section>


@endsection