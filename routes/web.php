<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;

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

// Route::get('/', [MessageController::class, 'index']);

// Route::resource('/message', MessageController::class)->middleware('auth.basic');

// Route::get('/user/create', [UserController::class, 'create']);
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('auth.basic');
// Route::post('/user/{id}', [UserController::class, 'update'])->middleware('auth.basic');


// Route::get('/login', [LoginController::class, 'login']);
// Route::post('/toLogin', [LoginController::class, 'toLogin']);
// Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
