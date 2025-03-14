<!-- Подключаем шаблон (шапка)-->
@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Снаружи')

@section('content')
<div class="interior-container">
    <h1 class="interior-text-center">Вид домика снаружи</h1>
    <div class="interior-blocks-container">
        <!-- Блок 1 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/Forest.jpg') }}" alt="Тихое и спокойное место">
            </div>
            <div class="interior-text-container">
                <p>Прямо посреди леса</p>
            </div>
        </div>

        <!-- Блок 2 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/terassa.jpg') }}" alt="Терасса">
            </div>
            <div class="interior-text-container">
                <p>Терасса с видом на природу и удобными креслами</p>
            </div>
        </div>

        <!-- Блок 3 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/grill.jpg') }}" alt="Гриль">
            </div>
            <div class="interior-text-container">
                <p>Мангальная зона с грилем, столом и скамьей</p>
            </div>
        </div>

        <!-- Блок 4 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/beautifulForest.jpg') }}" alt="Лес">
            </div>
            <div class="interior-text-container">
                <p>Великолепный лес в шаговой доступности!</p>
            </div>
        </div>

        <!-- Блок 5 -->
        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/dwor.jpg') }}" alt="Двор">
            </div>
            <div class="interior-text-container">
                <p>Большой двор для разных мероприятий</p>
            </div>
        </div>

        <div class="interior-block interior-fade-in">
            <div class="interior-image-container">
                <img src="{{ asset('images/interior/river.jpg') }}" alt="Озеро">
            </div>
            <div class="interior-text-container">
                <p>На берегу озера, с небольшим причалом. Рыбалка и водные развлечения!</p>
            </div>
        </div>
    </div>
</div>


@endsection