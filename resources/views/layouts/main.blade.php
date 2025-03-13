<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="icon" href="{{ asset('icons/favicon.ico') }}">
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
 
  <title>@yield('title', 'Aframe')</title>
</head>
<body>
 
<header class="header">
    <nav class="navbar">
        <div class="navbar-content">
            <a href="{{ route('home') }}">
                <img class="logo" 
                     src="{{ asset('images/logo.png') }}"  
                     alt="Jarviranta logo"
                     width="120"
                     height="120"
                     loading="lazy">
            </a>
            <div class="slogan">
                <h1>Ваш идеальный отдых начинается здесь <br> уют, природа и комфорт под одной крышей!</h1>
            </div>
            <div class="social-icons">
                <a href="https://vk.com/" target="_blank" class="social-icon">
                    <img src="{{ asset('icons/vk.png') }}" alt="vk">
                </a>
                <a href="https://blog.whatsapp.com/whats-app-web?lang=ru_RU" target="_blank" class="social-icon">
                    <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp">
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="social-icon">
                    <img src="{{ asset('icons/instagram.png') }}" alt="instagram">
                </a>
                <a href="https://web.telegram.org/" target="_blank" class="social-icon">
                    <img src="{{ asset('icons/telegram.png') }}" alt="telegram">
                </a>
            </div>
        </div>
        <hr class="divider">
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">

                    @if (Route::has('login'))
                @auth
                    <li><a href="{{ route('home') }}">Главная страница</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('home') }}#contacts">Контакты</a></li>
                    <li><a href="{{ route('aframeRules') }}">Правила проживания</a></li>
                    <li><a href="{{ route('home') }}#prices">Цены</a></li>
                    <li><a href="{{ route('home') }}#whatDo">Чем заняться</a></li>
                    <li><a href="{{ route('news.index') }}">Новости</a></li>
                    <li><a href="{{ route('userCabinet') }}">Личный кабинет</a></li>
                   
                @else
                    <li><a href="{{ route('home') }}">Главная страница</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('home') }}#contacts">Контакты</a></li>
                    <li><a href="{{ route('aframeRules') }}">Правила проживания</a></li>
                    <li><a href="{{ route('home') }}#prices">Цены</a></li>
                    <li><a href="{{ route('home') }}#whatDo">Чем заняться</a></li>
                    <li><a href="{{ route('news.index') }}">Новости</a></li>
                    <li><a href="{{ route('login') }}">Вход</a></li>
                @endif
            @endif

        </ul>
    </nav>
</header>

<!-- Основной контент -->
<main>
  <div class="container">
  @if ($errors->any())
        <!-- Обработка ошибок -->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <!-- Вывод сообщений success -->
      @if (session('success'))
        <div class='alert alert-success'>
          {{session('success')}}
         </div>
      @endif

      
      @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        </div>
    @yield('content')

</main>

<footer class="footer">
    <div class="footer-container">
        <!-- Логотип -->
        <div class="footer-logo">
            <a href="{{ route('home') }}">
                <img class="logo" 
                     src="{{ asset('images/logo.png') }}"  
                     alt="Jarviranta logo"
                     width="120"
                     height="120"
                     loading="lazy">
            </a>
        </div>

        <!-- Меню 1 -->
        <div class="footer-menu">
            <ul>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('home') }}">Правила проживания</a></li>
                <li><a href="{{ route('home') }}#prices">Цены</a></li>
            </ul>
        </div>

        <!-- Меню 2 -->
        <div class="footer-menu">
            <ul>
                <li><a href="{{ route('home') }}#whatDo">Чем заняться</a></li>
                <li><a href="{{ route('home') }}">Новости</a></li>
                <li><a href="{{ route('home') }}">Правила проживания</a></li>
            </ul>
        </div>

        <!-- Меню 3 -->
        <div class="footer-menu">
            <ul>
                <li><a href="{{ route('home') }}">Дом внутри</a></li>
                <li><a href="{{ route('home') }}">Дом снаружи</a></li>
                <li><a href="{{ route('home') }}">Очень ждем вас в гости!</a></li>
            </ul>
        </div>

        <!-- Социальные иконки и ссылка -->

        <div class="footer-social">
            <div class="social-icons-footer">
                <a href="https://vk.com/" target="_blank" class="icon">
                    <img src="{{ asset('icons/vk.png') }}" alt="vk">
                </a>
                <a href="https://blog.whatsapp.com/whats-app-web?lang=ru_RU" target="_blank" class="icon">
                    <img src="{{ asset('icons/whatsapp.png') }}" alt="whatsapp">
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="icon">
                    <img src="{{ asset('icons/instagram.png') }}" alt="instagram">
                </a>
                <a href="https://web.telegram.org/" target="_blank" class="icon">
                    <img src="{{ asset('icons/telegram.png') }}" alt="telegram">
                </a>
            </div>
            <a class="footerMainLink" href="#">
                <h2>Jarvira.ru</h2>
            </a>
        </div>
    </div>

</footer>

<script src="{{ asset('scripts/interior.js') }}"></script>
<script src="{{ asset('scripts/smooth.js') }}"></script>
<script src="{{ asset('scripts/view.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


</body>
</html>