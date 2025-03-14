@extends('layouts.main')

@section('title', 'Наши правила')

@section('content')
<section class="about-section container">
<div class="about-container">
        <div class="about-text">
        <h1>Правила проживания</h1>
            <div class="divider"></div>
            <h2>Добро пожаловать к нам в гости!</h2>
            <p>Милые гости, просим вас перед бронированием внимательно ознакомиться со следющими правилами проживания
            </p>
            <p>Просим вас прибывать строго в указанные временные рамки. На нашей территории не предусмотрено помещения для ожидания перед заселением в домик, а ранний заезд невозможен. Выезд из домика также должен быть осуществлен строго до указанного времени (до 12 ч) – после вас в домик будут заселяться другие гости и нам нужно должное время на подготовку и уборку дома.
            </p>
            <p>Будьте культурны в своём отдыхе. На нашей территории запрещены шумные вечеринки. Также у нас установлены “тихие часы” с 22:00 до 8:00 ч.
            Настоятельно просим соблюдать правила пожарной безопасности, находясь в доме, в зоне кострища и мангала, а также на придомовой территории. Запрещено оставлять открытый огонь в доме (в зоне печи) и в зоне мангала без присмотра.
            </p>
            <p>СТРОГО ЗАПРЕЩЕНО курение в доме и разбрасывание окурков. Окурки бросайте, пожалуйста, в пепельницу на террасе/костровую чашу или мусорное ведро (предварительно затушенные)
            Разжигание костров вне отведенных для этого специальных зон запрещено (разрешено ТОЛЬКО в мангале и костровой чаше). Использование ЛЮБОЙ ПИРОТЕХНИКИ на территории строго запрещено!

        </p>
        <p>Просим беречь окружающую природу и обитателей леса. Мусор выбрасывайте, пожалуйста, в специально отведенные места. Не устраивайте конфетти или что-то подобное (что предполагает разлет мелкого мусора) на придомовой территории и участке, в лесу. Благодарим вас за соблюдение правил и бережное отношение.
        </p>
            <div class="cta-button">
                <a href="{{ route('home') }}#contacts" class="route-button">Забронировать сейчас</a>
            </div>
            <div class="divider"></div>
        </div>
        <div class="about-image">
            <img src="{{ asset('images/aframeHome.jpg') }}" alt="наш домик" loading="lazy">
        </div>
    </div>
</section>
@endsection