<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::resource('surveys', SurveyController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

