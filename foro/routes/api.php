<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamUserController;
use App\Http\Controllers\TeamController;

Route::post('/users-teams', [TeamUserController::class, 'insert']);
Route::post('/events', [EventController::class, 'insert']);
Route::post('/teams', [TeamController::class, 'insert']);