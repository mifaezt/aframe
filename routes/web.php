<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;

// Маршрут показ формы welcomeBlade
Route::get('/', function () {
    return view(view: 'welcome');
})->name('home');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// маршрут новостей
Route::get('/news', [PostController::class, 'index'])->name('news.index');
// маршрут олд удалить
Route::get('/news/{slug}', [PostController::class, 'show'])->name('news.show');

// Наши правила
Route::get("aframeRules", [App\Http\Controllers\UserController::class, 'aframeRules'])->name('aframeRules');

// Маршрут показ формы онас
Route::get("about", [App\Http\Controllers\UserController::class, 'about'])->name('about');

// Маршрут показ Дом внутри
Route::get("inside", [App\Http\Controllers\UserController::class, 'inside'])->name('inside');

// Маршрут показ Домснаружи
Route::get("outside", [App\Http\Controllers\UserController::class, 'outside'])->name('outside');

// Группировка гостя
Route::middleware('guest')->group(function(){

    // Маршрут показ формы регистрации
    Route::get("register", [App\Http\Controllers\UserController::class, 'create'])->name('register');

    // Маршрут для приема данных(этот метод будет обрабатывать данные, отправленные из формы регистрации)
    Route::post("register", [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

    // Маршрут показ формы входа
    Route::get("login", [App\Http\Controllers\UserController::class, 'login'])->name('login');
    // действие из формы
    Route::post('login', [App\Http\Controllers\UserController::class, 'loginAuth'])->name('login.auth');
    // форма забыл пароль
    Route::get('forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', [App\Http\Controllers\UserController::class, 'forgotPasswordStore'])->middleware('throttle:3,1')-> name('password.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('user.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('reset-password', [App\Http\Controllers\UserController::class, 'resetPasswordUpdate'])->name('password.update');
});

// Группировка изподлогирования
Route::middleware('auth')->group(function () {

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); //верифицируется email
        return redirect()->route('userCabinet');
        })->middleware('signed')->name('verification.verify');
      
    // Маршрут уведомления verify. middle - механизм проверки http запросов
    Route::get('/verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');

    //  Повторная отправка из документации
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Ссылка отправлена повторно!');
    })->middleware('throttle:3,1')->name('verification.send');

    // Маршрут кабинета
    Route::get('userCabinet', [App\Http\Controllers\UserController::class, 'userCabinet'])->middleware('verified')->name('userCabinet');


    // выход из аккаунта
    Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

    // Маршруты для бронирования
    Route::get('/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/events', [BookingController::class, 'getEvents'])->name('bookings.events');
    Route::get('/bookings/check', [BookingController::class, 'checkAvailability'])->name('bookings.check');
});