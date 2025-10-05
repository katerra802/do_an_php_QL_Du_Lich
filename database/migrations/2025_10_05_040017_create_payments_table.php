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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->dateTime('PaymentDate');
            $table->decimal('Amount', 15, 2);
            $table->string('PaymentMethod', 50);
            $table->string('TransactionID')->nullable(); // Mã giao dịch từ cổng thanh toán
            $table->enum('Status', ['Success', 'Failed', 'Pending'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
