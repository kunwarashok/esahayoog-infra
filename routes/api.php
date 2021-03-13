<?php

use App\Http\Controllers\Api\EntityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/entity/{uniqueName}', [EntityController::class, 'info'])->middleware('cors');

Route::post('/v1/donate', [EntityController::class, 'donate'])->middleware('cors');
