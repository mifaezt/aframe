<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('house_settings', function (Blueprint $table) {
            $table->decimal('price_friday', 8, 2)->nullable()->after('price_per_night');
            $table->decimal('price_saturday', 8, 2)->nullable()->after('price_friday');
        });
    }
    
    public function down()
    {
        Schema::table('house_settings', function (Blueprint $table) {
            $table->dropColumn(['price_friday', 'price_saturday']);
        });
    }
};
