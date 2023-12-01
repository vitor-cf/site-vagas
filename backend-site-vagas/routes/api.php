<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Candidato */
Route::controller(UsuarioController::class)->prefix('/usuario')->group(function (){
    Route::post('/', 'criaUsuario');
    Route::get('/pega-usuario/{id}', 'pegaUsuario');
    Route::put('/edita-usuario/{id}', 'editaUsuario');
    Route::post('/cadastro-pessoal/{id}', 'cadastraFormulario');
    Route::delete('/deleta-usuario/{id}', 'deletaUsuario');
});

/* Empresa */
Route::controller(EmpresaController::class)->prefix('/empresa')->group(function (){
    Route::post('/cadastrar/vaga/{id}', 'criarVaga');
});