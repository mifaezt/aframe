<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('house_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название домика
            $table->text('description')->nullable(); // Описание
            $table->decimal('price_per_night', 8, 2); // Цена за ночь
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_settings');
    }
};
