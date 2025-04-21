@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: #fff;">
    <div class="row">
        <!-- Lado Esquerdo com Texto e Ilustração -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center p-5">
            <h2 class="fw-bold text-primary">Mostre seu talento para o mundo e conquiste novas oportunidades</h2>
            <p class="mt-3">Cadastre-se agora e conecte-se a contratantes que valorizam seu trabalho!</p>
            <img src="{{ asset('imgs/banner.jpg') }}" alt="Ilustração Artista" class="img-fluid mt-4" style="max-height: 300px;">
            <div class="d-flex gap-3 mt-5">
                <a href="#"><i class="bi bi-instagram fs-3 text-dark"></i></a>
                <a href="#"><i class="bi bi-envelope fs-3 text-dark"></i></a>
                <a href="#"><i class="bi bi-whatsapp fs-3 text-dark"></i></a>
                <a href="#"><i class="bi bi-linkedin fs-3 text-dark"></i></a>
            </div>
        </div>

        <!-- Formulário -->
        <div class="col-md-6 bg-primary text-white p-5">
            <h2 class="text-center mb-4">Artista</h2>
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_usuario" value="2">

                <div class="mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>

                <div class="mb-3 d-flex justify-content-around">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo_usuario" value="1" id="masculino">
                        <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo_usuario" value="2" id="feminino">
                        <label class="form-check-label" for="feminino">Feminino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo_usuario" value="3" id="outro">
                        <label class="form-check-label" for="outro">Não informar</label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                </div>

                <div class="mb-3">
                    <input type="text" name="documento" class="form-control" placeholder="CPF/CNPJ" required>
                </div>

                <div class="mb-3">
                    <label for="data_nasc" class="form-label text-white">Data de Nascimento</label>
                        <input type="date" name="data_nasc" class="form-control" id="data_nasc" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="senha_confirmation" class="form-control" placeholder="Confirmar senha" required>
                </div>

                <button type="submit" class="btn btn-light text-primary w-100">Criar conta</button>

      
            </form>
        </div>
    </div>
</div>
@endsection
