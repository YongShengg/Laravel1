<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserHome;
//\app\Http\Controllers\AuthManager
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
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

//check if the user is logged in
Route::group(['middleware' => 'auth'], function(){
    Route::get('/userHome', [UserHome::class, 'userHome'])->name('userHome');
    Route::post('/userHome', [UserHome::class, 'userHomePost'])->name('userHome.post');
    Route::get('/userProfile', [UserHome::class, 'userProfile'])->name('userProfile');
    Route::post('/userProfile/{id}', [UserHome::class, 'userProfilePost'])->name('userProfile.post');
    Route::get('/userBooking', [UserHome::class, 'userBooking'])->name('userBooking');
    Route::post('/userBooking/{id}', [UserHome::class, 'userBookingPost'])->name('userBooking.post');

    Route::get('/userTracking', [UserHome::class, 'userTracking'])->name('userTracking');
    Route::post('/userTracking/{id}', [UserHome::class, 'userTrackingPost'])->name('userTracking.post');
    
    Route::get('/userHistory', [UserHome::class, 'userHistory'])->name('userHistory');
    Route::post('/userHistory/{id}', [UserHome::class, 'userHistoryPost'])->name('userHistory.post');
});

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');