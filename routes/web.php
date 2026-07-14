<?php

use App\Http\Controllers\MemberController;
Route::resource('members', MemberController::class);
use App\Http\Controllers\BookController;
Route::resource('books', BookController::class);
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
