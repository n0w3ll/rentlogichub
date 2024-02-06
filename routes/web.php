<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('property', PropertyController::class )->middleware(['auth']);
Route::get('/removeImg/{property}/{imgid}', [PropertyController::class, 'removeImg'])
    ->name('removeImg')
    ->middleware(['auth']);
Route::resource('tenant', TenantController::class )->middleware(['auth']);
Route::resource('rent', RentController::class )->middleware(['auth']);
Route::resource('invoice', InvoiceController::class )->middleware(['auth']);
Route::resource('transaction', TransactionController::class )->middleware(['auth']);
// Route::get('transaction/create/{inv}', [TransactionController::class,'create'])->middleware(['auth']);

Route::get('owner/all', [OwnerController::class, 'showall'])->name('owner.all')->middleware(['auth']);
Route::resource('owner', OwnerController::class )->middleware(['auth']);

Route::resource('rent', RentController::class )->middleware(['auth']);

require __DIR__.'/auth.php';
