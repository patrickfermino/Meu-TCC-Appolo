<?php

namespace App\Http\Controllers;

use App\Models\PropostaContrato;
use App\Models\PortfolioArtista;
use App\Models\Notificacao;
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
        'descricao' => 'required|string|min:20',
        'data' => 'required|date|after:today',
    ], [
        'id_artista.required' => 'Artista não selecionado.',
        'id_artista.exists' => 'O artista informado não existe.',
        'titulo.required' => 'O título é obrigatório.',
        'descricao.required' => 'A descrição é obrigatória.',
        'descricao.min' => 'A descrição deve conter pelo menos 20 caracteres.',
        'data.required' => 'A data é obrigatória.',
        'data.after' => 'A data deve ser posterior à data atual.',
    ]);

    $proposta = PropostaContrato::create([
        'id_artista' => $request->id_artista,
        'id_usuario_avaliador' => Auth::id(),
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data' => $request->data,
        'status' => 'Aguardando resposta',
    ]);

    $portfolio = PortfolioArtista::find($request->id_artista);

    if ($portfolio && $portfolio->usuario) {
        Notificacao::create([
            'usuario_id' => $portfolio->usuario->id,  // <-- agora está correto
            'remetente_id' => Auth::id(),
            'mensagem' => "Você recebeu uma nova proposta: {$request->titulo}",
            'lida' => false,
            'proposta_id' => $proposta->id,
        ]);
    }

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



    
    public function notificacoes()
{
    $usuario = Auth::user();

    if ($usuario->tipo_usuario != 2) {
        return response()->json([]);
    }

    $portfolio = $usuario->portfolioArtista;

    if (!$portfolio) {
        return response()->json([]);
    }

    $propostas = PropostaContrato::where('id_artista', $portfolio->id)
        ->with('usuarioAvaliador')
        ->latest()
        ->get();

    return response()->json($propostas);
}



public function responder(Request $request, $id)
{
    $proposta = PropostaContrato::findOrFail($id);

    $resposta = $request->input('resposta'); // 'aceitar' ou 'recusar'

    
    if ($proposta->id_artista !== auth()->id()) {
    abort(403, 'Acesso não autorizado.');


    if ($resposta === 'recusar') {
        $proposta->status = 'Recusada';

    } else {
        return redirect()->back()->with('error', 'Resposta inválida.');
    }

}
    $proposta->save();

    // Mensagem personalizada
    $mensagem = $resposta === 'recusar'
        ? "Sua proposta '{$proposta->titulo}' foi recusada pelo artista {$proposta->artista->nome}."
        : "Sua proposta '{$proposta->titulo}' foi aprovada por {$proposta->artista->nome} e será executada em {$data_execucao}. Telefone para contato: {$proposta->artista->telefone}.";

    // Criar notificação para o contratante
    Notificacao::create([
        'user_id' => $proposta->id_contratante,
        'mensagem' => $mensagem,
    ]);

    return redirect()->back()->with('success', 'Resposta registrada com sucesso.');
}





public function lerTodas()
{
    Notificacao::where('user_id', auth()->id())->update(['lida' => true]);
    return response()->json(['success' => true]);
}

}