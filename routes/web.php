<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaArtisticaController;


Route::get('/login_interno', function () {
    return view('login_interno');
});



// Route::get('/categorias_artisticas', function () {
//     return view('categorias_artisticas.index', compact('categorias'));
// });



Route::resource('categorias-artisticas', CategoriaArtisticaController::class)->parameters([
    'categorias-artisticas' => 'categoriaArtistica'
]);


Route::resource('usuarios', UsuarioController::class);