<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    CategoriaArtisticaController,
    UsuarioController,
    TipoUsuarioController,
    PortfolioArtistaController,
    ProfileController
};
use Illuminate\Http\Request;

Route::get('/login', function () {
    return view('auth/login');
});



Route::get('/login_interno', function () {
    return view('login_interno');
});
Route::post('/login_interno', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->tipo_usuario == 1) {
            return redirect()->route('categorias-artisticas.index');
        } else {
            Auth::logout();
            return redirect('/login_interno')->withErrors(['acesso' => 'Acesso não autorizado.']);
        }
    }

    return redirect('/login_interno')->withErrors(['login' => 'Credenciais inválidas.']);
})->name('loginInterno');


Route::get('/meu-perfil', [UsuarioController::class, 'editInterno'])->name('usuarios.editInterno');



Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/solicitantes', function () {
    return view('contratantes');
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categorias-artisticas', CategoriaArtisticaController::class)
        ->parameters(['categorias-artisticas' => 'categoriaArtistica']);
});

Route::resource('usuarios', UsuarioController::class);



Route::get('/usuarios/{id}/perfil-publico', [UsuarioController::class, 'showPerfilPublico'])->name('usuarios.perfilPublico');

Route::get('/cadastro/artista', [UsuarioController::class, 'createArtista'])->name('usuarios.createArtista');
Route::post('/cadastro/artista', [UsuarioController::class, 'storeArtista'])->name('usuarios.storeArtista');

Route::get('/cadastro/contratante', [UsuarioController::class, 'createContratante'])->name('usuarios.createContratante');
Route::post('/cadastro/contratante', [UsuarioController::class, 'storeContratante'])->name('usuarios.storeContratante');

Route::post('/usuarios/artista', [UsuarioController::class, 'storeArtista'])->name('usuarios.storeArtista');
Route::post('/usuarios/contratante', [UsuarioController::class, 'storeContratante'])->name('usuarios.storeContratante');



// portfolio 
Route::middleware(['auth'])->group(function () {
    Route::resource('portfolio', PortfolioArtistaController::class)->except(['show']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
});





Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
