<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/cennik', [ApiController::class,'cena']);
Route::get('/aktualnosci',[ApiController::class,'aktualnosci']);
Route::get('/aktualnosci/{id}',[ApiController::class,'artykul']);
Route::get('/index/aktualnosci',[ApiController::class,'carouselindex']);
Route::post('/login',[ApiController::class,'logowanie'])->name('logowanie');
Route::post('/register',[ApiController::class,'rejestracja'])->name('rejestracja');
Route::get('/role',[ApiController::class,'test']);
Route::get('/opinion',[ApiController::class,'opinion']);
Route::get('/dashboard/wszystkiezlecenia',[ApiController::class,'wszystkiezlecenia']);
