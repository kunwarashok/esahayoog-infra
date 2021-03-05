<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\TransactionController;
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

Route::redirect('/', '/login');
require __DIR__ . '/auth.php';

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/entities', [EntityController::class, 'index'])->middleware(['auth'])->name('entity');
Route::get('/entity/add', [EntityController::class, 'create'])->middleware(['auth'])->name('entity.create');
Route::post('/entity', [EntityController::class, 'store'])->middleware(['auth'])->name('entity.store');
Route::get('/entity/{id}/edit', [EntityController::class, 'edit'])->middleware(['auth'])->name('entity.edit');
Route::put('/entity/{id}/update', [EntityController::class, 'update'])->middleware(['auth'])->name('entity.update');

Route::get('/account/{id}/create', [AccountController::class, 'create'])->middleware(['auth'])->name('account.create');
Route::post('/account', [AccountController::class, 'store'])->middleware(['auth'])->name('account.store');
Route::get('/account/{id}/view', [AccountController::class, 'view'])->middleware(['auth'])->name('account.view');
Route::get('/account/{id}/edit', [AccountController::class, 'edit'])->middleware(['auth'])->name('account.edit');

Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transaction');