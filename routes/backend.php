<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('teste', [DashboardController::class, 'teste'])->name('teste');
Route::get('tabela', [DashboardController::class, 'tabela'])->name('tabela');