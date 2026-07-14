<?php

use App\Http\Controllers\BookController;
Route::resource('books', BookController::class);
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
