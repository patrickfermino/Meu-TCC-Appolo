@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Categoria Artística</h2>
    

    <form action="{{ route('categorias-artisticas.update', ['categorias_artistica' => $categoriaArtistica]) }}" method="POST">


        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $categoriaArtistica->nome) }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $categoriaArtistica->descricao) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>
@endsection