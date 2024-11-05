<?php

use Illuminate\Support\Facades\Route;
use Modules\TestModule\Http\Controllers\TestModuleController;

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

Route::group([], function () {
    Route::resource('testmodule', TestModuleController::class)->names('testmodule');
});
