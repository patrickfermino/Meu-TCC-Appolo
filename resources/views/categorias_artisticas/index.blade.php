@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Categorias Artísticas</h2>
    <a href="{{ route('categorias-artisticas.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->descricao }}</td>
            <td>
            <a href="{{ route('categorias-artisticas.edit', ['categoriaArtistica' => $categoria->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('categorias-artisticas.destroy', $categoria->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Nenhuma categoria encontrada.</td>
        </tr>
    @endforelse
</tbody>
        
        </tbody>
    </table>
</div>
@endsection
