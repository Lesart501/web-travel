<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/', [HomeController::class, 'book'])->name('book');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('admin');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// Починить всё
Route::get('/admin/add', [AdminController::class, 'addTourForm'])->name('tour.add');
Route::post('/admin', [AdminController::class, 'saveTour'])->name('tour.save');

Route::get('/admin/edit', [AdminController::class, 'editTourForm'])->name('tour.edit');
Route::post('/admin', [AdminController::class, 'updateTour'])->name('tour.update');

Route::get('/admin/delete', [AdminController::class, 'deleteTourForm'])->name('tour.delete');
Route::post('/admin', [AdminController::class, 'destroyTour'])->name('tour.destroy');
