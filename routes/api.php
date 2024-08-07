<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventsController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);


Route::group(['middleware'=>'auth:api'],function () {
    Route::get('/events', [EventsController::class, 'index']);
    Route::get('/events/{event}', [EventsController::class, 'show']);
    Route::post('/events', [EventsController::class, 'store']);
    Route::put('/events/{event}', [EventsController::class, 'update']);
    Route::delete('/events/{event}', [EventsController::class, 'destroy']);
    Route::get('/events/{event}/download-pdf', [EventsController::class, 'downloadPdf']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

