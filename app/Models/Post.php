<?php

namespace App\Models; // Пространство имен для моделей

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Поля, которые можно массово назначать
    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
    ];

        // Функция очистки от тегов в посте
    public function getCleanBodyAttribute()
{
    return strip_tags($this->body);
}
}