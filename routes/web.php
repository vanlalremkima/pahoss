<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('parkings', ParkingController::class);

Route::get('bookings/index/{id}',[BookingController::class,'booking'])->name('bookings');

Route::get('bookings/veiw_all/{id}',[BookingController::class,'view'])->name('bookings.view');
Route::delete('bookings/cancel/{id}',[BookingController::class,'cancel'])->name('bookings.cancel');

Route::get('bookings/all',[BookingController::class,'booking_list'])->name('bookings.list');

Route::put('bookings/complete/{id}',[BookingController::class,'complete'])->name('bookings.complete');



