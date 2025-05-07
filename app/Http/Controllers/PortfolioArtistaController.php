<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioArtista;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoriaArtistica;


class PortfolioArtistaController extends Controller
{

    
    public function index()
    {
        $user = Auth::user();

        if ($user->tipo_usuario != 2) {
            abort(403, 'Acesso não autorizado.');
        }

        $portfolio = PortfolioArtista::where('id_usuario', $user->id)->first();

        return view('portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        if (Auth::user()->tipo_usuario != 2) {
            abort(403);
        }

        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->tipo_usuario != 2) {
            abort(403);
        }

        $request->validate([
            'nome_artistico' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
            'link_instagram' => 'nullable|url',
            'link_behance' => 'nullable|url',
            'categorias' => 'array|nullable'
        ]);

        PortfolioArtista::create([
            'id_usuario' => Auth::id(),
            'nome_artistico' => $request->nome_artistico,
            'descricao' => $request->descricao,
            'link_instagram' => $request->link_instagram,
            'link_behance' => $request->link_behance,
        ]);

        Auth::user()->categoriasArtisticas()->sync($request->categorias);

        return redirect()->back()->with('success', 'Portfólio criado com sucesso!');
    }

    public function edit($id)
    {
        $portfolio = PortfolioArtista::findOrFail($id);

        if ($portfolio->id_usuario != Auth::id()) {
            abort(403);
        }

        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = PortfolioArtista::findOrFail($id);
        $user = Auth::user();
    
        if ($user->id !== $portfolio->id_usuario || $user->tipo_usuario != 2) {
            abort(403, 'Acesso não autorizado.');
        }
    
        $request->validate([
            'nome_artistico' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
            'link_instagram' => 'nullable|url',
            'link_behance' => 'nullable|url',
            'categorias' => 'array|nullable'
        ]);
    
        $portfolio = PortfolioArtista::findOrFail($id);
        $portfolio->update($request->only('nome_artistico', 'descricao', 'link_instagram', 'link_behance'));
    
        Auth::user()->categoriasArtisticas()->sync($request->categorias);
    
        return redirect()->back()->with('success', 'Portfólio atualizado com sucesso!');
    }




    public function destroy($id)
    {
        $portfolio = PortfolioArtista::findOrFail($id);

        if ($portfolio->id_usuario != Auth::id()) {
            abort(403);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfólio removido com sucesso.');
    }
}