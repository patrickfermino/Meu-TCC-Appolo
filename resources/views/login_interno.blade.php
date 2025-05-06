<!-- Página para login interno dos adms do sistema  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/login_interno.css') }}" />
 
</head>
 

<div class="background">
    <div class="card">


        <body>
        <form class="form" method="POST" action="{{ route('loginInterno') }}">
    @csrf
    <img src="{{ asset('imgs/appolologo.png') }}" />

    {{-- Exibir mensagens de erro --}}
    @if($errors->any())
        <div class="alert alert-danger" style="color:red; text-align:center">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <span class="input-span">
        <label for="email" class="label">Email</label>
        <input type="email" name="email" id="email" required />
    </span>

    <span class="input-span">
        <label for="password" class="label">Senha</label>
        <input type="password" name="password" id="password" required />
    </span>

    <span class="span"><a href="#">Esqueceu sua senha?</a></span>

    <input class="submit" type="submit" value="Log in" />
</form>


    </div> 
</div>



</body>
</html>

