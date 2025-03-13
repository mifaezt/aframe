<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\HouseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewBookingNotification;
class BookingController extends Controller
{


    // Отображает форму бронирования
    public function create()
    {
        $houseSetting = HouseSetting::first(); // Получаем первую запись (у нас всего один домик)
        return view('bookings.create', compact('houseSetting'));
    }

    // Отображение календаря на странице
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Проверка доступности дат
        $isAvailable = Booking::where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->doesntExist();

        if (!$isAvailable) {
            return back()->withErrors(['dates' => 'Домик уже забронирован на выбранные даты.']);
        }

        // Расчет стоимости
        $totalDays = Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $totalPrice = $totalDays * 5000; // Цена за ночь 

        // Создание бронирования
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

    public function getEvents()
{
    $bookings = Booking::all(); // Получаем все бронирования

    $events = [];
    foreach ($bookings as $booking) {
        $events[] = [
            'title' => 'Занято', // Название события
            'start' => $booking->start_date, // Дата начала
            'end' => $booking->end_date, // Дата окончания
            'color' => '#ff9f89', // Цвет события (например, красный)
        ];
    }

    return response()->json($events); // Возвращаем данные в формате JSON
}

    // Проверка доступности дат
    public function checkAvailability(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $isAvailable = Booking::where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate]);
            })
            ->doesntExist();

        return response()->json(['available' => $isAvailable]);
    }

    // Ценник бронирования в переменную pricePerNight
    public function userCabinet() {
        // Получаем цену домика из таблицы house_settings
        $houseSetting = HouseSetting::first(); // Предполагаем, что у вас только одна запись с настройками
        $pricePerNight = $houseSetting ? $houseSetting->price_per_night : null;
        $pricePerNightWeek = $houseSetting ? $houseSetting->price_per_night_week : null;
    
        // Передаем данные в вид
        return view('user.userCabinet', [
            'pricePerNight' => $pricePerNight,
            'pricePerNightWeek' => $pricePerNightWeek,
        ]);
    }
}