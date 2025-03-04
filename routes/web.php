<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentSlotController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ReservationSlotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/vk', [AuthController::class, 'handleVkAuth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('order-types', OrderTypeController::class);
    Route::resource('cycles', CycleController::class);
    Route::resource('slots', SlotController::class);
    Route::resource('products', ProductController::class);
    Route::resource('equipments', EquipmentController::class)->names('equipments');
    Route::resource('ingredients', IngredientController::class);
    Route::resource('equipment_slots', EquipmentSlotController::class);
    Route::resource('ingredient_products', IngredientProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order_products', OrderProductController::class);
    Route::resource('reservation_slots', ReservationSlotController::class);
});


require __DIR__.'/auth.php';
