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
        Schema::create('tours', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' tự tăng
            $table->string('TourName');
            $table->text('Description')->nullable();
            $table->longText('DetailedItinerary');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->decimal('PriceAdult', 15, 2);
            $table->integer('MaxSeats');
            $table->string('DeparturePoint');
            $table->text('IncludedServices')->nullable();
            $table->text('ExcludedServices')->nullable();
            $table->string('FeaturedImage')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('restrict');
            $table->enum('Status', ['Active', 'Inactive', 'Full'])->default('Active');
            $table->boolean('IsFeatured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
