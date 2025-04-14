<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars/{id}',[HomeController::class,'carshow'])->name('cars.carshow');
// ثم قم بتعريف باقي المسارات باستخدام Route::resource
Route::get('/cars/model/{model}', [HomeController::class, 'show'])->name('cars.byModel');
Route::post('/complaints', [HomeController::class, 'store'])->name('complaints.store');
Route::get('/about',function(){
    return view('about');

})->name('about');
Route::get('contact',function()
{
    return view('contact');
}
)->name('contact');


Route::get('carsall',[Controller::class,'index'])->name('carsall');
    Route::middleware(['role:user'])->group(function () {
        Route::resource('/dashboard', CarController::class);
        Route::resource('ads', AdController::class)->only(['index', 'destroy','approve']);

    });

    Route::middleware('auth')->group(function () {
        Route::resource('profile', ProfileController::class);
    });
        Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/store', [AdController::class, 'store'])->name('store');
Route::post('/complaints', [HomeController::class, 'store'])->name('complaints.store');




// للموافقة
Route::post('/ads/{ad}/approve', [AdController::class, 'approve'])->name('ads.approve');


require __DIR__.'/auth.php';
