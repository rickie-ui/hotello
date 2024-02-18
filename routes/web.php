<?php

use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users\AuthController;
use App\Http\Controllers\users\BookingController;
use App\Http\Controllers\users\ProfileController;
use App\Http\Controllers\users\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('guest')->group(function(){
    Route::get('/', [IndexController::class, 'index']);
    
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'store']);
    
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// authenticated guest routes
Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking');

    Route::get('/bookings/create/{id}', [BookingController::class, 'show'])->name('reserve');
    Route::post('/bookings/create/{id}', [BookingController::class, 'store']);

    Route::put('/cancel/{id}', [BookingController::class, 'cancel'])->name('cancel');
    Route::put('/checkin/{id}', [BookingController::class, 'checkIn'])->name('checkIn');
    Route::put('/checkout/{id}', [BookingController::class, 'checkOut'])->name('checkOut');

});

// admin register page
Route::prefix('admin')->middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'create']);
});

// authenticated admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/bookings', [BookController::class, 'index'])->name('book');
    Route::get('/rooms', [RoomController::class, 'index'])->name('room');

    Route::get('/rooms/add-room', [RoomController::class, 'create'])->name('create'); 
    Route::post('/rooms/add-room', [RoomController::class, 'store']); 
    Route::get('/rooms/delete/{id}', [RoomController::class, 'destroy'])->name('destroy'); 

    Route::get('/rooms/update/{id}', [RoomController::class, 'show'])->name('update'); 
    Route::put('/rooms/update/{id}', [RoomController::class, 'update']); 
});

