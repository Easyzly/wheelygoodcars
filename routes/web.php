<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
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

Route::get('/', [CarController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/pdf', [PdfController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/car/form/create', [CarController::class, 'formcreate'])->name('car.form.create');
    Route::post('/car/store', [CarController::class, 'store'])->name('car.store');
    Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('car.edit');
    Route::get('/cars/read/{id}', [CarController::class, 'read'])->name('car.read');
    Route::post('/cars/update', [CarController::class, 'update'])->name('car.update');
    Route::post('/cars/delete', [CarController::class, 'destroy'])->name('car.delete');
    Route::post('/cars/sold', [CarController::class, 'sold'])->name('car.sold');
    Route::get('/cars/find/{Kenteken}', [CarController::class, 'find'])->name('car.find');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
