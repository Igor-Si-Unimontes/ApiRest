<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventsController;

Route::get('/events', [EventsController::class, 'index']);
Route::get('/events/{event}', [EventsController::class, 'show']);
Route::post('/events', [EventsController::class, 'store']);
Route::put('/events/{event}', [EventsController::class, 'update']);
Route::delete('/events/{event}', [EventsController::class, 'destroy']);