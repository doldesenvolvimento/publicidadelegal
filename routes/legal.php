<?php

use App\Http\Controllers\AcervoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/fill-data-pdfs', [FillPDFController::class, 'process']);
    Route::get('/qrcode', [QrCodeController::class, 'index']);
    Route::get('/qrcode-png', [QRController::class,'generateQrCode']);

    // Rotas Administração
    Route::any('empresa/listar/', [EmpresaController::class, 'index'])->name('index-empresa');
    Route::get('empresa/cadastrar/', [EmpresaController::class, 'create'])->name('create-empresa');
    Route::post('empresa/cadastrar/', [EmpresaController::class, 'store'])->name('store-empresa');
    Route::get('empresa/editar/{id}/', [EmpresaController::class, 'edit'])->name('edit-empresa');
    Route::post('empresa/editar/{id}/', [EmpresaController::class, 'update'])->name('update-empresa');
    Route::get('empresa/excluir/{id}/', [EmpresaController::class, 'destroy'])->name('destroy-empresa');

    Route::any('tipo/listar/', [TipoController::class, 'index'])->name('index-tipo');
    Route::get('tipo/cadastrar/', [TipoController::class, 'create'])->name('create-tipo');
    Route::post('tipo/cadastrar/', [TipoController::class, 'store'])->name('store-tipo');
    Route::get('tipo/editar/{id}/', [TipoController::class, 'edit'])->name('edit-tipo');
    Route::post('tipo/editar/{id}/', [TipoController::class, 'update'])->name('update-tipo');
    Route::get('tipo/excluir/{id}/', [TipoController::class, 'destroy'])->name('destroy-tipo');

    Route::any('publicacao/listar/', [AcervoController::class, 'index'])->name('index-publicacao');
    Route::get('publicacao/cadastrar/', [AcervoController::class, 'create'])->name('create-publicacao');
    Route::post('publicacao/cadastrar/', [AcervoController::class, 'store'])->name('store-publicacao');
    Route::get('publicacao/editar/{id}/', [AcervoController::class, 'edit'])->name('edit-publicacao');
    Route::post('publicacao/editar/{id}/', [AcervoController::class, 'update'])->name('update-publicacao');
    Route::get('publicacao/excluir/{id}/', [AcervoController::class, 'destroy'])->name('destroy-publicacao');
    Route::get('publicacao/download/{url}/', [AcervoController::class, 'download'])->name('download-publicacao');

    Route::any('usuario/listar/', [UserController::class, 'index'])->name('index-usuario');
    Route::get('usuario/cadastrar/', [UserController::class, 'create'])->name('create-usuario');
    Route::post('usuario/cadastrar/', [UserController::class, 'store'])->name('store-usuario');
    Route::get('usuario/editar/{id}/', [UserController::class, 'edit'])->name('edit-usuario');
    Route::post('usuario/editar/{id}/', [UserController::class, 'update'])->name('update-usuario');
    Route::get('usuario/excluir/{id}/', [UserController::class, 'destroy'])->name('destroy-usuario');

});
