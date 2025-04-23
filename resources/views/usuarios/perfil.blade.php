@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Perfil do Usuário</h2>
    <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>
    <p><strong>Tipo:</strong> {{ $usuario->tipoUsuario->descricao ?? 'N/A' }}</p>

    <!-- Você pode colocar um botão de "Editar perfil" aqui no futuro -->
</div>
@endsection