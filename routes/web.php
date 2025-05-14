<?php

use App\Http\Controllers\AdoptPetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FoundPetController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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



Route::get('/register',[RegisterController::class,'registerForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');
Route::post('/contact-us/mail', [MailController::class, 'sendMail'])->name('sendMail');

Route::middleware( 'auth:sanctum')->group(function () {
// Adopt pets routes
    Route::Resource('adopt-pets', AdoptPetController::class);

// Found pets routes
    Route::Resource('found-pets', FoundPetController::class);
});

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '^(?!storage).*$');

