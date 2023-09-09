<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signin', [AuthController::class,'signin'])->name('microsoft.login');
Route::get('/callback', [AuthController::class,'callback'])->name('microsoft.callback');
Route::get('/signout',[AuthController::class,'signout'])->name('microsoft.signout');
Route::get('/creatEevent',[CalendarController::class,'createEvent'])->name('calendar.createEvent');