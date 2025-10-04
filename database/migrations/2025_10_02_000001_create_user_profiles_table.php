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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' tự tăng
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('FullName');
            $table->date('DateOfBirth');
            $table->string('PhoneNumber', 20);
            $table->string('CCCD', 20)->nullable();
            $table->boolean('IsDefault')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
