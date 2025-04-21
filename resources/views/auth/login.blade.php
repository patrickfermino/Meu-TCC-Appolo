@extends('layouts.app')

@section('content')
    <div class="form-box">
        <h2>Login</h2>
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" required>

            <label for="senha">Senha</label>
            <input type="password" name="password" placeholder="Senha" required>

            <a href="#" style="color: #fff; font-size: 0.85rem;">Esqueceu a senha?</a>

            <button type="submit">Fazer login</button>
        </form>

        <hr style="margin: 1.5rem 0; border-color: rgba(255, 255, 255, 0.2);">

        <a href="{{ route('usuarios.createArtista') }}">
            <button type="button" style="background-color: #4e00c2; color: #fff;">Criar conta</button>
        </a>
    </div>
@endsection
