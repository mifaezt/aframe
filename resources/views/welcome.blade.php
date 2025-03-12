<!-- Подключаем шаблон -->
@extends('layouts.main')
<!-- yeld реализация -->
@section('title', 'Jarviranta')

@section('content')

<section>
    <div class="homeImage">
        <div class="homeSlogan">
            <h1>Отдохните от суеты в гостевом А-фрейм домике на берегу живописного озера в Карелии!</h1>
            <div class="button-link-container">
                @auth <!-- Если пользователь залогинен -->
                    <a href="{{ route('bookings.create') }}" class="button-link">ЗАБРОНИРОВАТЬ</a>
                @else <!-- Если пользователь не залогинен -->
                    <a href="{{ route('login') }}" class="button-link">ЗАБРОНИРОВАТЬ</a>
                @endauth
            </div>
        </div>
    </div>
</section>

<section class="section">
<div class="serviceFirstBlock container gradient-sections">
    <h2 class="blockInfo">Что входит</h2>

    <div class="serviceSecondBlock">
        <div class="serviceTripleBlock">
            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/sauna.svg" alt="sauna">
                </div>
                <div class="serviceDesc">
                    <h3>Финская сауна</h3>
                    <p>Теплая сауна прямо в доме, банные принадлежности  и комфортный душ с туалетом</p>
                </div>
            </div>

            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/wifi.svg" alt="wifi">
                </div>
                <div class="serviceDesc">
                    <h3>Бесплатный WiFi</h3>
                    <p>WiFi по всей территории и парковка рядом с домом</p>
                </div>
            </div>

            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/kitchen.svg" alt="kitchen">
                </div>
                <div class="serviceDesc">
                    <h3>Кухня</h3>
                    <p>Варочная панель, микроволновка, электрочайник, холодильник, кофеварка, посуда, чай, кофе, сахар, крупы, масло, специи и соль</p>
                </div>
            </div>
        </div>

        <div class="serviceTripleBlock">
            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/grill.svg" alt="grill">
                </div>
                <div class="serviceDesc">
                    <h3>Мангальная зона</h3>
                    <p>Большой мангал, шампуры, сетка, уголь, розжиг, спички, апохало, дрова. Стол и скамейки рядом</p>
                </div>
            </div>

            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/bed.svg" alt="bed">
                </div>
                <div class="serviceDesc">
                    <h3>Спальня</h3>
                    <p>Два удобных двуспальных места, постельное белье, пледы</p>
                </div>
            </div>

            <div class="serviceComponent">
                <div class="serviceIcon">
                    <img src="/icons/badminton.svg" alt="badminton">
                </div>
                <div class="serviceDesc">
                    <h3>Досуг</h3>
                    <p>Рыбалка и прогулка по лесу в любое время года!
                    Лето: Бадминтон, фрисби, дартс, два сапборда
                    Зима: Тюбинг, ледянка, настольные игры</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="section">
    <div class="homeView container">
    <div class="blockInfo">Наш гостевой дом</div>
    <div class="gallery-container">
        <div class="gallery-item" data-target="outside">
            <a href="{{ route('outside') }}">
            <img src="{{asset('images/outside.jpg')}}" alt="Домик снаружи">
            <div class="overlay">Снаружи</div>
            </a>
        </div>
        <div class="gallery-item" data-target="inside">
            <a href="{{ route('inside') }}">
            <img src="{{asset('images/inside.jpg')}}" alt="Домик внутри">
            <div class="overlay">Внутри</div>
            </a>
        </div>
    </div>
    </div>
</section>


<section id="prices" class="section">
    <div class=" pricing-section container">
        <div class="pricing-content">
            <div class="pricing-text">
                <h2>Цены</h2>
                <p>Наши афрейм домики предлагают комфорт и уют по доступным ценам. Выберите подходящий вариант и наслаждайтесь отдыхом в гармонии с природой.</p>
                <ul class="heart-list">
                    <li> С понедельника по четверг:  @if(isset($pricePerNight))
                    <p>Цена за ночь:<strong> {{ $pricePerNight }} </strong> руб. / сутки</p>
                @else
                    <p><strong>Цена за ночь:</strong> Не указана</p>
                @endif
                </li>

                 
                    <li> С пятницы по воскресенье и праздники: @if(isset($pricePerNightWeek))
                    <p>Цена за ночь: <strong>{{ $pricePerNightWeek }} </strong> руб. / сутки</p>
                        @else
                    <p><strong>Цена за ночь:</strong> Не указана</p>
                        @endif</li>
                    <li> Доп. гость — 1 500 р. с человека в сутки</li>
                    <li> Заезд с 14:00, выезд до 12:00</li>
                </ul>
                @auth <!-- Если пользователь залогинен -->
                <a href="{{ route('bookings.create') }}" class="btnPricing">ЗАБРОНИРОВАТЬ</a>
            @else <!-- Если пользователь не залогинен -->
                <a href="{{ route('login') }}" class="btnPricing">ЗАБРОНИРОВАТЬ</a>
            @endauth
                <p>*Цены динамические, могут меняться от сезона и спроса. Тарифы можно уточнить в наших соцсетях или напрямую по номеру телефона в рзделе <a class="link" href="#contacts">Контакты</a></p>
            </div>
            <div class="pricing-image">
                <img src="{{ asset('images/PricingImage.jpg') }}" alt="Афрейм домик">
            </div>
        </div>
    </div>
</section>

<!-- Ckfqlth -->
<section id="whatDo" class="section">
    <div class="container">
<h2 class="blockInfo">Досуг</h2>
  <swiper-container 

  >
    <!-- Слайд 1 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/walkDog.jpg') }}" alt="Описание изображения" class="slider-image">
          <div class="slider-description">
            <h3>Насладитесь природой</h3>
            <p>Отправьтесь в прогулку по живописным местам Карельского леса</p>
          </div>
        </div>
      </div>
    </swiper-slide>

    <!-- Слайд 2 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/sup.jpg') }}" alt="Прогулка по лесу" class="slider-image">
          <div class="slider-description">
            <h3>Прогулка по воде</h3>
            <p>Откройте мир невероятных впечатлений с прогулкой на сапборде по озеру в лесу</p>
          </div>
        </div>
      </div>
    </swiper-slide>

    <!-- Слайд 3 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/homegames.jpg') }}" alt="Настольные игры" class="slider-image">
          <div class="slider-description">
            <h3>Развечения даже в плохую погоду</h3>
            <p>Уютная атмосфера, горячий чай и настольные баталии</p>
          </div>
        </div>
      </div>
    </swiper-slide>

    <!-- Слайд 4 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/walkGames.jpg') }}" alt="Игры на улице" class="slider-image">
          <div class="slider-description">
            <h3>Игры на свежем воздухе</h3>
            <p>У нас есть все для активного времяпрепровождения</p>
          </div>
        </div>
      </div>
    </swiper-slide>

    <!-- Слайд 5 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/sauna.jpg') }}" alt="Баня" class="slider-image">
          <div class="slider-description">
            <h3>Расслабтесь после тяжелой недели</h3>
            <p>Поллный комплект для банного отдыха, искупайтесь в озере после пара</p>
          </div>
        </div>
      </div>
    </swiper-slide>

    <!-- Слайд 6 -->
    <swiper-slide>
      <div class="slider-block">
        <div class="slider-item">
          <img src="{{ asset('images/su-27.jpg') }}" alt="Описание изображения" class="slider-image">
          <div class="slider-description">
            <h3>Полетайте на истрибителе СУ-27</h3>
            <p>Сделайте смертельную петлю прямо в Карельское озеро!</p>
          </div>
        </div>
      </div>
    </swiper-slide>
  </swiper-container>
  </div>
</section>

<!-- Как добраться -->
<section id="contacts" class="section">
    <div class="container">
        <h2 class="blockInfo">Как добраться и контакты</h2>
        <div class="how-to-get">
            <!-- Контейнер для карты -->
            <div class="map-container">
                <div id="map" style="width: 100%; height: 100%;">
                    <div style="position:relative;overflow:hidden;">
                        <a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a>
                        <a href="https://yandex.ru/maps/10933/republic-of-karelia/house/snt_peldozhskoye_1/Z0oYcAJiTkQDQFhrfXpxc3xgbA==/?ll=33.652714%2C61.602039&utm_medium=mapframe&utm_source=maps&z=17.12" style="color:#eee;font-size:12px;position:absolute;top:14px;">СНТ Пелдожское, 1 — Яндекс Карты</a>
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=33.652714%2C61.602039&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgo0MzMwMzg5NjIwErAB0KDQvtGB0YHQuNGPLCDQoNC10YHQv9GD0LHQu9C40LrQsCDQmtCw0YDQtdC70LjRjywg0J_RgNGP0LbQuNC90YHQutC40Lkg0YDQsNC50L7QvSwg0KHQstGP0YLQvtC30LXRgNGB0LrQvtC1INGB0LXQu9GM0YHQutC-0LUg0L_QvtGB0LXQu9C10L3QuNC1LCDQodCd0KIg0J_QtdC70LTQvtC20YHQutC-0LUsIDEiCg1hnAZCFX1odkI%2C&z=17.12" width="100%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                </div>
            </div>

            <!-- Контейнер для текста и контактов -->
            <div class="info-container">
                <h2>Связь с нами через мессенджеры и мобильный телефон</h2>
                <p class="address">Адрес: СНТ Пелдожское, 1, Святозерское сельское поселение, Пряжинский район, Республика Карелия</p>
                <div class="contacts">
                    <p>Телефон: +7 (123) 456-78-90 <br> Email: jarviranta@mail.ru</p>
                </div>
                <div class="social-icons">
                    <a class="social-icon" href="https://vk.com/" target="_blank">
                        <img src="{{ asset('icons/vk.png') }}" alt="vk">
                    </a>
                    <a class="social-icon" href="https://blog.whatsapp.com/whats-app-web?lang=ru_RU" target="_blank">
                        <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp">
                    </a>
                    <a class="social-icon" href="https://www.instagram.com/" target="_blank">
                        <img src="{{ asset('icons/instagram.png') }}" alt="instagram">
                    </a>
                    <a class="social-icon" href="https://web.telegram.org/" target="_blank">
                        <img src="{{ asset('icons/telegram.png') }}" alt="telegram">
                    </a>
                </div>
                <a href="https://yandex.ru/maps/-/CHuwI0MJ" class="route-button">Маршрут на карте</a>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('scripts/swiper.js') }}"></script>

@endsection