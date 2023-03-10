<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('super-admin')->group(function () {
    Route::get('/super-admin', [SuperAdminController::class, 'index'])->name('super-admin.index');
    Route::get('/super-admin/organisation/{organisationId}', [SuperAdminController::class, 'organisationDetails'])->name('super-admin.organisation');
    Route::put('/super-admin/organisation/{organisationId}', [SuperAdminController::class, 'organisationUpdate'])->name('super-admin.organisation.update');
});

require __DIR__.'/auth.php';
