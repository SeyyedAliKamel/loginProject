<?php

use Illuminate\Support\Facades\Route;
use Modules\Game\app\Http\Controllers\GameController;


//games
Route::get('/game',[GameController::class, 'game'])->name('game');
Route::get('/game1',[GameController::class, 'game1'])->name('game1');
Route::get('/game2',[GameController::class, 'game2'])->name('game2');
