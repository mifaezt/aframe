<?php
namespace App\Http\View\Composers;

use App\Models\HouseSetting;
use Illuminate\View\View;

class PriceComposer
{
    public function compose(View $view)
    {
        // Получаем цену домика из таблицы house_settings
        $houseSetting = HouseSetting::first();
        $pricePerNight = $houseSetting ? $houseSetting->price_per_night : null;
        $pricePerNightWeek = $houseSetting ? $houseSetting->price_per_night_week : null;

        // Передаем переменную в вид
        $view->with('pricePerNight', $pricePerNight);
        $view->with('pricePerNightWeek', $pricePerNightWeek);
    }
}