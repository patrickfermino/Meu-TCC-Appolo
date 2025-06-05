


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/cadastro.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
@include('Components.navbarbootstrap')

    <main class="cadastro-container ">
        <div class="left-illustration">
            <img src="{{ asset('imgs/artistacadastro.jpg') }}" alt="Ilustração Artista">
        </div>

        <div class="form-section" id="formulario-login" >
        
            <h1 class="form-title">Cadastre-se Artista !</h1>
            <form action="{{ route('usuarios.storeArtista') }}" method="POST">
                @csrf

                <input type="text" name="nome" placeholder="Nome" required>
                
                <div class="gender-options">
                    <label><input type="radio" name="sexo_usuario" value="1" required> Masculino</label>
                    <label><input type="radio" name="sexo_usuario" value="2"> Feminino</label>
                    <label><input type="radio" name="sexo_usuario" value="3"> Não informar</label>
                </div>

                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="telefone" placeholder="Telefone">
                <input type="text" name="documento" placeholder="CPF/CNPJ" required>
                <input type="date" name="data_nasc" placeholder="Data de Nascimento" required>

                <input type="password" name="senha" placeholder="Senha" required>
                <input type="password" name="senha_confirmation" placeholder="Confirmar senha" required>

                <button type="submit" class="submit-btn">Criar conta</button>

                <p class="login-link">Já tem conta? <a href="{{ route('login') }}">Conecte-se</a></p>
            </form>
        </div>
    </main>

    @include('Components.footer')

</html>