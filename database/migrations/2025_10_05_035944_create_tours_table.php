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
            $table->id();
            $table->string('TourName');
            $table->text('Description')->nullable();
            $table->longText('DetailedItinerary'); // Chi tiết hành trình
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->decimal('PriceAdult', 15, 2); // Giá cho người lớn
            $table->decimal('PriceChild', 15, 2)->nullable(); // Giá cho trẻ em
            $table->integer('MaxSeats');
            $table->string('DeparturePoint'); // Điểm khởi hành
            $table->text('IncludedServices')->nullable(); // Dịch vụ bao gồm
            $table->text('ExcludedServices')->nullable(); // Dịch vụ không bao gồm
            $table->string('FeaturedImage')->nullable(); // Ảnh đại diện
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->foreignId('destination_id')->constrained()->onDelete('restrict');
            $table->enum('Status', ['Active', 'Inactive', 'Full'])->default('Active'); // Trạng thái tour
            $table->boolean('IsFeatured')->default(false); // Tour nổi bật
            $table->timestamps();
            $table->softDeletes();
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
