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

Route::get('/tours', [MainController::class, 'tours'])->name('tours');
Route::get('/tourSearch', [MainController::class, 'tourSearch'])->name('tour.search');
Route::get('/filter', [MainController::class, 'filter'])->name('filter');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/{tour}/book', [HomeController::class, 'bookForm'])->name('book.form');
Route::post('/home/{tour}', [HomeController::class, 'book'])->name('book');

Route::delete('/home/{order}/cancel', [HomeController::class, 'cancelOrder'])->name('order.cancel');

Auth::routes();

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/search', [AdminController::class, 'search'])->name('search');

    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');

    Route::get('/orders/{order}/change', [AdminController::class, 'chStatusForm'])->name('status.change');
    Route::patch('/orders/{order}', [AdminController::class, 'saveStatus'])->name('status.save');

    Route::get('/admin/add/form', [AdminController::class, 'addTourForm'])->name('tour.add');
    Route::post('/admin/add', [AdminController::class, 'saveTour'])->name('tour.save');

    Route::get('/admin/{tour}/edit/form', [AdminController::class, 'editTourForm'])->name('tour.edit');
    Route::patch('/admin/{tour}/edit', [AdminController::class, 'updateTour'])->name('tour.update');

    Route::get('/admin/{tour}/delete', [AdminController::class, 'deleteTourForm'])->name('tour.delete');
    Route::post('/admin/{tour}', [AdminController::class, 'destroyTour'])->name('tour.destroy');
});
