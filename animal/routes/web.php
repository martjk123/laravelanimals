<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| Web Routes — Animals Module
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('animals.index');
});

Route::prefix('animals')->name('animals.')->group(function () {

    Route::get('/', [AnimalController::class, 'index'])->name('index');
    Route::get('/create', [AnimalController::class, 'create'])->name('create');
    Route::post('/', [AnimalController::class, 'store'])->name('store');

    Route::get('/{animal}', [AnimalController::class, 'show'])->name('show');
    Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('edit');

    Route::put('/{animal}', [AnimalController::class, 'update'])->name('update');
    Route::delete('/{animal}', [AnimalController::class, 'destroy'])->name('destroy');
});