

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
                <img src="{{ asset('images/interior/1.jpg') }}" alt="Описание фото 1">
            </div>
            <div class="interior-text-container">
                <p>Уютная гостиная с камином и мягкими креслами.</p>
            </div>
        </div>

        <!-- Блок 2 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/2.jpg') }}" alt="Описание фото 2">
            </div>
            <div class="interior-text-container">
                <p>Спальня с деревянной кроватью и большими окнами.</p>
            </div>
        </div>

        <!-- Блок 3 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/3.jpg') }}" alt="Описание фото 3">
            </div>
            <div class="interior-text-container">
                <p>Кухня с современной техникой и обеденной зоной.</p>
            </div>
        </div>

        <!-- Блок 4 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/4.jpg') }}" alt="Описание фото 4">
            </div>
            <div class="interior-text-container">
                <p>Ванная комната с душевой кабиной и стильным дизайном.</p>
            </div>
        </div>

        <!-- Блок 5 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/5.jpg') }}" alt="Описание фото 5">
            </div>
            <div class="interior-text-container">
                <p>Терасса с видом на природу и удобными креслами.</p>
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
