<?php

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/entities', [EntityController::class, 'index'])->middleware(['auth'])->name('entity');
Route::get('/entities/add', [EntityController::class, 'create'])->middleware(['auth'])->name('entity.create');
Route::post('/entities', [EntityController::class, 'store'])->middleware(['auth'])->name('entity.store');
Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transaction');

require __DIR__ . '/auth.php';