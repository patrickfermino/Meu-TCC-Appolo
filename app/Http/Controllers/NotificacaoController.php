<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropostaContrato; 
use App\Models\Usuario;
use App\Models\Notificacao;

class NotificacaoController extends Controller
{
public function index()
{
    $usuario = Auth::user();

    $notificacoes = Notificacao::where('usuario_id', $usuario->id)
        ->where('lida', false)
        ->with('proposta', 'proposta.usuarioAvaliador')
        ->latest()
        ->take(5)
        ->get();

    return response()->json($notificacoes);
}
}