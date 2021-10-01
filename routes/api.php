<?php

use App\Http\Controllers\Categoria\CategoriaController;
use App\Http\Controllers\Comprador\CompradorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vendedor\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::resource('compradores', CompradorController::class, ['only' => ['index', 'show']]);
Route::resource('vendedores', VendedorController::class, ['only' => ['index', 'show']]);
Route::resource('categorias', CategoriaController::class, ['except' => ['create', 'edit']]);
