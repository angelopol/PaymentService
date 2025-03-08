<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\GatewayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Payment routes
Route::post('/payments', [PaymentController::class, 'store']);
Route::put('/payments/{id}', [PaymentController::class, 'update']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::get('/payments/email/{email}', [PaymentController::class, 'getByEmail']);
Route::get('/payments/status/{status}', [PaymentController::class, 'getByStatus']);

// Refund routes
Route::post('/payments/{id}/refund', [RefundController::class, 'store']);
Route::put('/refunds/{id}', [RefundController::class, 'update']);
Route::delete('/refunds/{id}', [RefundController::class, 'destroy']);

// Gateway routes
Route::get('/gateways', [GatewayController::class, 'index']);
Route::get('/gateways/{id}', [GatewayController::class, 'show']);
Route::post('/gateways', [GatewayController::class, 'store']);
Route::put('/gateways/{id}', [GatewayController::class, 'update']);
Route::delete('/gateways/{id}', [GatewayController::class, 'destroy']);