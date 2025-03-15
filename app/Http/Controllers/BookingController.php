<?php

namespace App\Http\Controllers;

use Carbon\Carbon; //Ипорт библиотеки для работы с датами
use App\Models\Booking;
use App\Models\HouseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewBookingNotification;

// Управление бронированием
class BookingController extends Controller
{


    // Отображает форму создания бронирования
    public function create()
    {
        $houseSetting = HouseSetting::first(); // Получаем первую запись (у нас всего один домик)
        return view('bookings.create', compact('houseSetting')); //передаем в вид для использование характеристик домика
    }

    // Обработка данных из формы бронирования, сохранение брони
    public function store(Request $request)
    {
        // валидируем даты
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Проверка доступности дат, ищем пересечения с уже имеющимися бронями
        $isAvailable = Booking::where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->doesntExist();

            // Если даты недоступны, возвращаем пользователя назад с сообщением об ошибке.
        if (!$isAvailable) {
            return back()->withErrors(['dates' => 'Домик уже забронирован на выбранные даты.']);
        }

        // Иначе
        // Расчет стоимости количество дней * цену за ночь
        $totalDays = Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $totalPrice = $totalDays * 6000; // Цена за ночь 

        // Создание бронирования черпез модель
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);

        // Получаем текущего пользователя
        $user = auth()->user();

        // Отправляем уведомление администратору
        $adminEmail = 'mifaezt@gmail.com';
        Notification::route('mail', $adminEmail)
            ->notify(new NewBookingNotification($booking, $user));

        // Редирект на страницу личного кабинета с сообщением об успехе
        return redirect()->route('userCabinet')->with('success', 'Бронирование успешно создано!');
    }

}