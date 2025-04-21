<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', function () {
    return view('auth/login');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/cadastro/artista', [UsuarioController::class, 'createArtista'])->name('usuarios.createArtista');
Route::post('/cadastro/artista', [UsuarioController::class, 'storeArtista'])->name('usuarios.storeArtista');

Route::get('/cadastro/contratante', [UsuarioController::class, 'createContratante'])->name('usuarios.createContratante');
Route::post('/cadastro/contratante', [UsuarioController::class, 'storeContratante'])->name('usuarios.storeContratante');


require __DIR__.'/auth.php';
