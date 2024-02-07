<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('properties', PropertyController::class );
    Route::get('/removeImg/{property}/{imgid}', [PropertyController::class, 'removeImg'])->name('removeImg');
    Route::resource('tenants', TenantController::class );
    Route::resource('rents', RentController::class );
    Route::resource('invoices', InvoiceController::class );
    Route::resource('transactions', TransactionController::class );
    Route::resource('owners', OwnerController::class );
    Route::resource('agents', AgentController::class );
    Route::resource('vendors', VendorController::class );
});

require __DIR__.'/auth.php';
