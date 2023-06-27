<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Definir rota "not found"
Route::fallback(function () {
    // Aqui você pode retornar uma resposta personalizada para a rota não encontrada
    return view('notFound'); // Por exemplo, renderizar uma view de erro 404
});

//Grupo para rotas que comecem com /user
Route::group(['prefix' => '/user'], function () {

    Route::get('/create', [UserController::class, 'create'])->name('user.create');

    Route::post('/create', [UserController::class, 'createSave'])->name('createSave');

    Route::get('/login', [UserController::class, 'login'])->name('user.login');

    Route::post('/login', [UserController::class, 'login'])->name('user.login');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

// Rota para buscar view para adicionar uploads
Route::get('/upload', [UploadController::class, 'index'])->name('upload')->middleware('auth');

// Adicionar upload
Route::post('/upload/save', [UploadController::class, 'save'])->name('upload.save')->middleware('auth');


// Abrir editor de texto
Route::get('/editor', [EditorController::class, 'index'])->name('editor')->middleware('auth');

// Adicionar novo texto
Route::post('/documents/save', [EditorController::class, 'save'])->name('editor.save')->middleware('auth');


// Listar documentos do usuário
Route::get('/documents', [DocumentsController::class, 'index'])->name('documents')->middleware('auth');

// Listar todos os documentos
Route::get('/documents/todos', [DocumentsController::class, 'indexTodos'])->name('documents.todos')->middleware('auth');

// Listar todos os documentos comaprtilahdos com o usuário autenticado
Route::get('/documents/shared', [DocumentsController::class, 'indexShared'])->name('documents.shared')->middleware('auth');

// Buscar documentos
Route::post('/documents/busca', [DocumentsController::class, 'busca'])->name('documents.busca')->middleware('auth');

//Editar documentos
Route::get('/documents/{documento}/edit', [EditorController::class, 'editar'])->name('documents.editar')->middleware('auth');

Route::post('/documents/{documento}/edit', [EditorController::class, 'editarGravar'])->name('documents.editar')->middleware('auth');


// Compartilhar documentos
Route::get('/documents/compartilhar/{document}', [DocumentsController::class, 'compartilhar'])->name('documents.compartilhar')->middleware('auth');

Route::post('/documents/compartilhar/{document}', [DocumentsController::class, 'compartilharGravar'])->name('documents.compartilhar.gravar')->middleware('auth');

// Apagar Documents
Route::get('/documents/apagar/{document}', [DocumentsController::class, 'apagar'])->name('documents.apagar')->middleware('auth');

Route::delete('/documents/apagar/{document}', [DocumentsController::class, 'apagar'])->middleware('auth');
