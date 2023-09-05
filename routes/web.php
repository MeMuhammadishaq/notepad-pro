<?php

use App\Http\Controllers\EditingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/header', function () {
    return view('header');
});


Route::get('/ck',[EditingController::class,'view'])->name('view')->middleware('auth');
Route::post('/ck',[EditingController::class,'insert'])->name('insert')->middleware('auth');

Route::get('/show',[EditingController::class,'read'])->name('show')->middleware('auth');

Route::get('/edit/{id}',[EditingController::class,'edit'])->name('edit')->middleware('auth');
Route::post('/edit/store',[EditingController::class,'update'])->name('update')->middleware('auth');
Route::get('/delete/{id}',[EditingController::class,'delete'])->name('delete')->middleware('auth');
Route::get('/reading/{id}',[EditingController::class,'reading'])->name('reading')->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
