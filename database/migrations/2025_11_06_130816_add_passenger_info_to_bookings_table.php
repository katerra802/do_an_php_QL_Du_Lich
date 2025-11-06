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
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('NumberOfAdults')->default(1)->after('tour_id');
            $table->integer('NumberOfChildren')->default(0)->after('NumberOfAdults');
            $table->string('CustomerName')->after('NumberOfChildren');
            $table->string('CustomerEmail')->after('CustomerName');
            $table->string('CustomerPhone')->after('CustomerEmail');
            $table->date('TourDate')->after('CustomerPhone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['NumberOfAdults', 'NumberOfChildren', 'CustomerName', 'CustomerEmail', 'CustomerPhone', 'TourDate']);
        });
    }
};
