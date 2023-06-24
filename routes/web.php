<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Faker\Documentor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque')->middleware('auth');

Route::post('/estoque/busca', [EstoqueController::class, 'busca'])->name('estoque.busca');

Route::get('/estoque/adicionar', [EstoqueController::class, 'adicionar'])->name('estoque.adicionar');

Route::post('/estoque/adicionar', [EstoqueController::class, 'adicionarGravar']);

Route::get('/estoque/editar/{estoque}', [EstoqueController::class, 'editar'])->name('estoque.editar');

Route::put('/estoque/adicionar', [EstoqueController::class, 'editarGravar']);

Route::get('/estoque/apagar/{estoque}', [EstoqueController::class, 'apagar'])->name('estoque.apagar');

Route::delete('/estoque/apagar/{estoque}', [EstoqueController::class, 'apagar']);

//Grupo para rotas que comecem com /user
Route::group(['prefix' => '/user'], function () {

    Route::get('', [UserController::class, 'index'])->name('user');

    Route::get('/create', [UserController::class, 'create'])->name('user.create');

    Route::post('/create', [UserController::class, 'createSave'])->name('createSave');

    Route::get('/login', [UserController::class, 'login'])->name('user.login');

    Route::post('/login', [UserController::class, 'login'])->name('user.login');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::get('/upload', [UploadController::class, 'index'])->name('upload');

Route::post('/upload/save', [UploadController::class, 'save'])->name('upload.save');


//Rotas para o editor de texto
Route::get('/editor', [EditorController::class, 'index'])->name('editor');

Route::post('/documents/save', [EditorController::class, 'save'])->name('editor.save');



// Rotas para a lista de documentos
Route::get('/documents', [DocumentsController::class, 'index'])->name('documents')->middleware('auth');

// Rota para busca
Route::post('/documents/busca', [DocumentsController::class, 'busca'])->name('documents.busca');

// Editar Documentos

Route::get('/documents/adicionar', [DocumentsController::class, 'adicionar'])->name('documents.adicionar');

Route::post('/documents/adicionar', [DocumentsController::class, 'adicionarGravar']);

// Route::get('/documents/editar/{documents}', [DocumentsController::class, 'editar'])->name('documents.editar');

// Route::post('/documents/editar', [DocumentsController::class, 'editarGravar'])->name('documents.editarGravar');

Route::get('/documents/{documento}/edit', [EditorController::class, 'editar'])->name('documents.editar');

Route::post('/documents/{documento}/edit', [EditorController::class, 'editarGravar'])->name('documents.editar');


// Compartilhar documentos

Route::get('/documents/compartilhar/{document}', [DocumentsController::class, 'compartilhar'])->name('documents.compartilhar');
Route::post('/documents/compartilhar/{document}', [DocumentsController::class, 'compartilharGravar'])->name('documents.compartilhar.gravar');




// Route::put('/documents/editar/{documents}', [DocumentsController::class, 'editarGravar']);

// Route::put('/documents/editar/', [DocumentsController::class, 'editarGravar']);



//Talvez usar assim
// Route::put('/documents/editar/{documents}', [DocumentsController::class, 'editarGravar']);



// Apagar Documents
Route::get('/documents/apagar/{document}', [DocumentsController::class, 'apagar'])->name('documents.apagar');

Route::delete('/documents/apagar/{document}', [DocumentsController::class, 'apagar']);


// Route::get('/teste', function() {
//     return 'O teste funcionou';
// });
// Route::get('/teste-com-view', function() {
//     return view('teste');
// });
// Route::get('/noticia/{id?}', function($id = 'NADA') {
//     return "Você está lendo a notícia {$id}";
// });
