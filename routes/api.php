<?php

use App\Http\Controllers\DetailOrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlateController;
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

Route::ApiResource('orders', OrderController::class);
Route::get('orders/code_date/{code_date}', [OrderController::class, 'getByCodeDate']);

Route::ApiResource('plates', PlateController::class);

Route::ApiResource('detail_orders', DetailOrdersController::class);
