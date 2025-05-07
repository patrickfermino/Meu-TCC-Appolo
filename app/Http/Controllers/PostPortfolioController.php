<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostPortfolio;
use App\Models\PostImagem;
use App\Models\TipoUsuario;
use App\Models\PortfolioArtista;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostPortfolioController extends Controller



{


    public function __construct()
{
    $this->middleware('auth')->only(['store', 'create', 'edit']);
}




    public function store(Request $request)
    {
        $user = Auth::user();


        if (!Auth::check()) {
            dd('Usuário não está autenticado.');
        }
        // Verifica se é artista
        if ($user->tipo_usuario != 2) {
            abort(403, 'Acesso não autorizado.');
        }

        // Busca o portfólio do artista
        $portfolio = $user->portfolioArtista;
        if (!$portfolio) {
            return back()->with('error', 'Você precisa ter um portfólio antes de postar.');
        }

        // Valida dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'imagens.*' => 'image|max:2048'
        ]);

        // Cria o post
    
        $post = PostPortfolio::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'id_portfolio' => $portfolio->id,
        ]);
        if ($request->hasFile('imagens')) { 
            foreach ($request->file('imagens') as $imagem) {
                $caminho = $imagem->store('posts', 'public');
    
                PostImagem::create([
                    'post_id' => $post->id,
                    'caminho_imagem' => $caminho,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Post criado com sucesso!');
    }


    public function create()
{
    $user = auth()->user();
    if ($user->tipo_usuario_id != 2) {
        abort(403, 'Apenas artistas podem criar posts.');
    }
    return view('posts.create');
}

public function edit($id)
{
    $post = PostPortfolio::findOrFail($id);

    if ($post->usuario_id !== auth()->id()) {
        abort(403, 'Você não tem permissão para editar este post.');
    }

    return view('posts.edit', compact('post'));
}


}