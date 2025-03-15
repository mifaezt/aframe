<?php
// встроенный метод создания уведомлений
namespace App\Notifications;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue; откл для синхронного отправления
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification 
{
    use Queueable;
    protected $booking;
    protected $user;

    public function __construct($booking, $user)
    {
        $this->booking = $booking;
        $this->user = $user;
    }

    // определяем через что будем отправлять уведомление в методе via
    public function via($notifiable)
    {
        return ['mail']; // Отправляем уведомление по почте
    }

    // Формируем тело сообщения
    public function toMail($notifiable)
{

    if (!$this->user || !$this->booking) {
        throw new \Exception('Данные пользователя или бронирования отсутствуют.');
    }

    return (new MailMessage)
        ->subject('Новое бронирование')
        ->line('Пользователь ' . $this->user->name . ' создал новое бронирование.')
        ->line('Контактные данные:')
        ->line('Email: ' . $this->user->email)
        ->line('Телефон: ' . $this->user->phone)
        ->line('Дата начала бронирования: ' . $this->booking->start_date)
        ->line('Дата окончания бронирования: ' . $this->booking->end_date)
        ->action('Просмотреть бронирование', url('/admin/bookings')) // Ссылка на админку для удобства
        ->line('Jarviranta');
}
}