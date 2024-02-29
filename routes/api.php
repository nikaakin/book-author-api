<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

Route::group(['controller' => BookController::class, 'prefix' => 'books',], function () {
    Route::get('/', 'index')->name('books.index');
    Route::get('/{book}', 'show')->name('books.show');
    Route::post('/store', 'store')->name('books.store');
    Route::patch('/update/{book}', 'update')->name('books.update');
    Route::delete('/destroy/{book}', 'destroy')->name('books.destroy');
});
