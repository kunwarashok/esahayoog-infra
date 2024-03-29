<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DocumentController;
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
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return "Cache Cleared";
});

Route::redirect('/', '/login');
require __DIR__ . '/auth.php';

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/entities', [EntityController::class, 'index'])->middleware(['auth'])->name('entity');
Route::get('/entity/add', [EntityController::class, 'create'])->middleware(['auth'])->name('entity.create');
Route::post('/entity', [EntityController::class, 'store'])->middleware(['auth'])->name('entity.store');
Route::get('/entity/{id}/edit', [EntityController::class, 'edit'])->middleware(['auth'])->name('entity.edit');
Route::put('/entity/{id}/update', [EntityController::class, 'update'])->middleware(['auth'])->name('entity.update');
Route::delete('/entity/{id}', [EntityController::class, 'delete'])->middleware(['auth'])->name('entity.destroy');


Route::get('/account/{id}/create', [AccountController::class, 'create'])->middleware(['auth'])->name('account.create');
Route::post('/account', [AccountController::class, 'store'])->middleware(['auth'])->name('account.store');
Route::get('/account/{entityId}', [AccountController::class, 'view'])->middleware(['auth'])->name('account.view');
Route::get('/account/{id}/edit', [AccountController::class, 'edit'])->middleware(['auth'])->name('account.edit');
Route::put('/account/{id}/update', [AccountController::class, 'update'])->middleware(['auth'])->name('account.update');
Route::delete('/account/{id}', [AccountController::class, 'delete'])->middleware(['auth'])->name('account.destroy');

Route::get('/document/{id}/create', [DocumentController::class, 'create'])->middleware(['auth'])->name('document.create');
Route::post('/document', [DocumentController::class, 'store'])->middleware(['auth'])->name('document.store');
Route::get('/document/{entityId}', [DocumentController::class, 'view'])->middleware(['auth'])->name('document.view');
Route::get('/document/{id}/edit', [DocumentController::class, 'edit'])->middleware(['auth'])->name('document.edit');
Route::put('/document/{id}/update', [DocumentController::class, 'update'])->middleware(['auth'])->name('document.update');
Route::delete('/document/{id}', [DocumentController::class, 'delete'])->middleware(['auth'])->name('document.destroy');


Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transaction');

Route::get('/users', [UserController::class, 'index'])->middleware(['auth'])->name('user');