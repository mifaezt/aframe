const swiperEl = document.querySelector("swiper-container");

const params = {
    loop: true, // Бесконечный слайдер
    autoplay: {
        delay: 3500, // Задержка между слайдами (в миллисекундах)
        disableOnInteraction: false, // Продолжать автопрокрутку после взаимодействия пользователя
    },
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: false,
    pagination: { clickable: true },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
};

Object.assign(swiperEl, params);
// swiperEl.initialize();
