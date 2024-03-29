<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;
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

//Route::middleware('patikrinimas')->group(function (){

    Route::get('/',[OwnerController::class,'owners'])->name("owners.list");
    Route::get('/owners/create',[OwnerController::class,'create'])->name("owners.create");
    Route::post('/owners/store',[OwnerController::class,'store'])->name("owners.store");
    Route::get('/owners/{id}/update',[OwnerController::class,'update'])->name("owners.update");
    Route::post('/owners/{id}/save',[OwnerController::class,'save'])->name("owners.save");
    Route::get('/owners/{id}/delete',[OwnerController::class,'delete'])->name("owners.delete");
    Route::post('/owners/search',[OwnerController::class,'search'])->name("owners.search");
    Route::post('/owners/forget',[OwnerController::class, 'forget'])->name("owners.forget");


//Route::resource('cars', CarController::class)->middleware('auth');

    Route::middleware('auth')->group(function (){
        Route::resource('cars', CarController::class)->except(['index'])->middleware('adminOrNot');
        Route::resource('cars', CarController::class)->only(['index']);
        Route::post('/cars/search',[CarController::class, 'search'])->name("cars.search");
        Route::post('/cars/forget',[CarController::class, 'forget'])->name("cars.forget");

    });

//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
