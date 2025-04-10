<?php


namespace App\Http\Controllers;

use App\Models\CategoriaArtistica;
use Illuminate\Http\Request;

class CategoriaArtisticaController extends Controller
{
    public function index()
    {
        $categorias = CategoriaArtistica::all();
        return view('categorias_artisticas.index', compact('categorias'));  
    }

    public function create()
    {
        return view('categorias_artisticas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'descricao' => 'required|string',
        ]);

        CategoriaArtistica::create($request->all());

        return redirect()->route('categorias-artisticas.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function show(CategoriaArtistica $categoriaArtistica)
    {
        return view('categorias_artisticas.show', compact('categoriaArtistica'));
    }

    
    
    
    public function edit(CategoriaArtistica $categoriaArtistica)


    {

        return view('categorias_artisticas.edit', compact('categoriaArtistica'));
    }



    public function update(Request $request, CategoriaArtistica $categoriaArtistica)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'descricao' => 'required|string',
        ]);

        $categoriaArtistica->update($request->all());

        return redirect()->route('categorias-artisticas.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(CategoriaArtistica $categoriaArtistica)
    {
        $categoriaArtistica->delete();

        return redirect()->route('categorias-artisticas.index')->with('success', 'Categoria excluída com sucesso.');
    }
}
