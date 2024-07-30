<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CVController;

Route::get('/cv/create', [CVController::class, 'create'])->name('cv.create');
Route::post('/cv', [CVController::class, 'store'])->name('cv.store');
Route::get('/cv/{id}', [CVController::class, 'show'])->name('cv.show');
Route::get('/cv/{id}/download', [CVController::class, 'download'])->name('cv.download');

