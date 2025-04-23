<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaArtisticaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Support\Facades\Auth;



Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/login_interno', function () {
    return view('login_interno');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
// ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categorias-artisticas', CategoriaArtisticaController::class)->parameters([
    'categorias-artisticas' => 'categoriaArtistica'
]);

Route::resource('usuarios', UsuarioController::class);


Route::get('/cadastro/artista', [UsuarioController::class, 'createArtista'])->name('usuarios.createArtista');
Route::post('/cadastro/artista', [UsuarioController::class, 'storeArtista'])->name('usuarios.storeArtista');

Route::get('/cadastro/contratante', [UsuarioController::class, 'createContratante'])->name('usuarios.createContratante');
Route::post('/cadastro/contratante', [UsuarioController::class, 'storeContratante'])->name('usuarios.storeContratante');

Route::post('/usuarios/artista', [UsuarioController::class, 'storeArtista'])->name('usuarios.storeArtista');
Route::post('/usuarios/contratante', [UsuarioController::class, 'storeContratante'])->name('usuarios.storeContratante');


Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
