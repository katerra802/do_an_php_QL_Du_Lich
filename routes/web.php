<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Tour Routes
Route::get('/tours', [App\Http\Controllers\TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{id}', [App\Http\Controllers\TourController::class, 'show'])->name('tours.show');
Route::post('/tours/{id}/calculate-price', [App\Http\Controllers\TourController::class, 'calculatePrice'])->name('tours.calculate-price');
Route::post('/tours/{id}/booking', [App\Http\Controllers\TourController::class, 'booking'])->name('tours.booking');

// Booking Routes
Route::get('/bookings/{tourId}/create', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{bookingId}/payment', [App\Http\Controllers\BookingController::class, 'payment'])->name('bookings.payment');
Route::post('/bookings/{bookingId}/payment', [App\Http\Controllers\BookingController::class, 'processPayment'])->name('bookings.processPayment');
Route::get('/bookings/{bookingId}/confirmation', [App\Http\Controllers\BookingController::class, 'confirmation'])->name('bookings.confirmation');

Route::middleware('auth')->group(function () {
    Route::get('/my-bookings', [App\Http\Controllers\BookingController::class, 'myBookings'])->name('bookings.myBookings');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// prefix('admin'): Tự động thêm /admin vào trước tất cả các URL trong nhóm (ví dụ: /admin/dashboard).
// name('admin.'): Tự động thêm admin. vào trước tên của tất cả các route (ví dụ: admin.dashboard), giúp tránh bị trùng tên.
// Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {

//     Route::get('/dashboard', function () {
//         return 'Đây là trang Dashboard của Admin';
//     });

//     // ... Đặt tất cả các route của admin vào đây ...

// });

require __DIR__ . '/auth.php';
