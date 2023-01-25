<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
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
    return view('auth.login');
});

Route::middleware('auth','CheckRole:admin')->group(function () {
    // route book admin
    Route::get('/book/create', [BookController::class, 'create'])->name("book-create");
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name("book-edit");
    Route::post('/book/store', [BookController::class, 'store'])->name("book-store");
    Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name("book-delete");
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name("book-update");

});

Route::middleware('auth','CheckRole:admin,user')->group(function () {
    // route book admina and user
    Route::get('/book/index', [BookController::class, 'index'])->name("book-index");

    // route dashboard admin and user
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // route student and user
    Route::get('/student/index', [StudentController::class, 'index'])->name("student-index");
});

Auth::routes();