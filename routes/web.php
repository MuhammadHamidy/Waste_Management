<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteManagement;

Route::get('/', [WasteManagement::class, 'index'])->name('dashboard');
Route::post('/waste/store', [WasteManagement::class, 'store'])->name('waste.store');
Route::get('/waste/{id}/edit', [WasteManagement::class, 'edit'])->name('waste.edit');
Route::post('/waste/{id}/update', [WasteManagement::class, 'update'])->name('waste.update');
Route::delete('/waste/{id}', [WasteManagement::class, 'destroy'])->name('waste.destroy');
Route::post('/users/store', [WasteManagement::class, 'storeUser'])->name('users.store');
