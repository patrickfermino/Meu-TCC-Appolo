<?php

namespace App\Http\Controllers;

use App\Models\PropostaContrato;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropostaContratoController extends Controller
{
    public function index()
    {
        $propostas = PropostaContrato::with(['artista', 'usuarioAvaliador'])->get();
        return response()->json($propostas);
    }



public function store(Request $request)
{
    $request->validate([
        'id_artista' => 'required|exists:portfolio_artistas,id',
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'data' => 'required|date',
    ]);

    PropostaContrato::create([
        'id_artista' => $request->id_artista,
        'id_usuario_avaliador' => Auth::id(),
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data' => $request->data,
    ]);

    return redirect()->back()->with('success', 'Proposta enviada com sucesso!');
}

    public function show($id)
    {
        $proposta = PropostaContrato::with(['artista', 'usuarioAvaliador'])->findOrFail($id);
        return response()->json($proposta);
    }

    public function update(Request $request, $id)
    {
        $proposta = PropostaContrato::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'sometimes|string',
            'data' => 'sometimes|date',
        ]);

        $proposta->update($validated);

        return response()->json($proposta);
    }

    public function destroy($id)
    {
        $proposta = PropostaContrato::findOrFail($id);
        $proposta->delete();

        return response()->json(['message' => 'Proposta excluída com sucesso.']);
    }
}