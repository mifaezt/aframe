

<!-- Подключаем шаблон (шапка) -->
@extends('layouts.main')

<!-- Заголовок страницы -->
@section('title', 'Внутри')

<!-- Контент страницы -->
@section('content')

<div class="interior-container">
    <h1 class="interior-text-center">Вид домика внутри</h1>
    <div class="interior-blocks-container">
        <!-- Блок 1 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/mainRoom.jpg') }}" alt="Главная комната">
            </div>
            <div class="interior-text-container">
                <p>Уютная гостиная и просторная гостинная</p>
            </div>
        </div>

        <!-- Блок 2 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/kitchen.jpg') }}" alt="Кухня">
            </div>
            <div class="interior-text-container">
                <p>Современная кухня со всем необходимым</p>
            </div>
        </div>

        <!-- Блок 3 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/upBedroom.jpg') }}" alt="Спальня">
            </div>
            <div class="interior-text-container">
                <p>Две кровати и раскладной диван, комфортное размещение 6 человек</p>
            </div>
        </div>

        <!-- Блок 4 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/showeRoom.jpg') }}" alt="Душевая">
            </div>
            <div class="interior-text-container">
                <p>Ванная комната с душевой кабиной и стильным дизайном.</p>
            </div>
        </div>

        <!-- Блок 5 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/sauna.jpg') }}" alt="Сауна">
            </div>
            <div class="interior-text-container">
                <p>Горячая сауна</p>
            </div>
        </div>

        <!-- Блок 6 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/toilet.jpg') }}" alt="Сауна">
            </div>
            <div class="interior-text-container">
                <p>Туалет внутри дома</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const blocks = document.querySelectorAll('.interior-block');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('interior-fade-in');
                observer.unobserve(entry.target); // Останавливаем наблюдение после появления
            }
        });
    }, {
        threshold: 0.1 // Блок появится, когда 10% его будет видно
    });

    blocks.forEach(block => {
        observer.observe(block);
    });
});
</script>

@endsection
