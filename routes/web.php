<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
