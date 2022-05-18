<?php

use App\Http\Controllers\LoginController;

Route::namespace('Auth')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'autenticacao'])->name('autenticacao');
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
});