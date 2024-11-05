<?php

use Illuminate\Support\Facades\Route;
use Modules\Test\app\Http\Controllers\AdminController;

// Admin
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');

    Route::get('/admin/add-user', [AdminController::class, 'createUser'])->name('admin.add-user');
    Route::post('/admin/store-user', [AdminController::class, 'storeUser'])->name('admin.store-user');

    Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('editUser');
    Route::post('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('updateUser');


    Route::get('/admin/add-admin', [AdminController::class, 'createAdmin'])->name('admin.add-admin');
    Route::post('/admin/store-admin', [AdminController::class, 'storeAdmin'])->name('admin.store-admin');

    Route::post('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    Route::get('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
});
