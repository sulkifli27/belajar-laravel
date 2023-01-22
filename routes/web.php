<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('backend.master');
});

Route::get('/book/create', [BookController::class, 'create'])->name("book-create");
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
Route::post('/book/store', [BookController::class, 'store'])->name("book-store");
Route::get('/book/index', [BookController::class, 'index'])->name("book-index");
Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name("book-delete");
Route::put('/book/update/{id}', [BookController::class, 'update'])->name("book-update");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
