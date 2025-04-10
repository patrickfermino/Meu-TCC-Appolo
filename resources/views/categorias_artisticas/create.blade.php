@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nova Categoria Artística</h2>

    <form action="{{ route('categorias-artisticas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
