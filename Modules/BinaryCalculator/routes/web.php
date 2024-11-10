<?php

use Illuminate\Support\Facades\Route;
use Modules\BinaryCalculator\app\Http\Controllers\BinaryCalculatorController;


Route::group([], function () {
    Route::get('/cal',[BinaryCalculatorController::class, 'cal'])->name('cal');
});
