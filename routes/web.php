<?php

use App\Http\Controllers\MemberController;
Route::resource('members', MemberController::class);
use App\Http\Controllers\BookController;
Route::resource('books', BookController::class);
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IssueController;
Route::resource('issues', IssueController::class);
Route::post('/issues/{id}/return', [IssueController::class, 'returnBook'])->name('issues.return');
Route::get('/', function () {
    return view('welcome');
});
