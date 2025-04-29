<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil Público</title>
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('Components.navbarbootstrap')


<section class="py-5">
    <div class="container" >
      <div class="row align-items-center">
        <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
          <img src="{{ $usuario->foto_perfil ? asset('storage/' . $usuario->foto_perfil) : asset('imgs/user.jpg') }}" class="rounded-circle border border-4 border-tertiary shadow profile-img" alt="Perfil">
        </div>
        <div class="col-md-9">
          <h1 class="text-nome">{{ $usuario->nome }} </h1>
          <p class="text-muted"><i class="bi bi-calendar"></i> {{ $usuario->idade }} anos </p>
          <p class="text-muted"><i class="bi bi-geo-alt"></i>  {{ $usuario->cidade ?? 'Localidade não definida' }}  </p>
          <p><strong>Endereço:</strong> {{ $usuario->cep }}  , {{ $usuario->bairro }} , {{ $usuario->endereco }}</p>
          <p class="text-muted"><i class="bi bi-brush"></i> Grafiteiro, Ilustrador "ainda n esta vindo do banco" </p>
          <div class="social-icons my-3">
            <a href="#" class="text-primary fs-4 me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-primary fs-4 me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-primary fs-4 me-3"><i class="bi bi-envelope"></i></a>
            <a href="#" class="text-primary fs-4 me-3"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="text-primary fs-4 me-3"><i class="bi bi-link-45deg"></i></a>
          </div>
          <div class="rating bg-primary bg-opacity-10 d-inline-flex align-items-center px-3 py-1 rounded-pill">
            <span class="fw-bold me-2">4.5</span>
            <div class="stars">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star text-warning"></i>
            </div>
            <span class="ms-2 text-muted">(55 avaliações)</span>
          </div>

          @auth
          @if(Auth::user()->tipo_usuario == 2)
          <button class="btn btn-outline-custom" data-bs-toggle="modal" data-bs-target="#editModalportfolio">
            <i class="bi bi-pencil"></i> Editar Portfólio
          </button>

          @endif
          @endauth

        </div>
      </div>
    </div>
  </section>


  


  <section class="py-4 bg-light">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <img src="image/obra1.jpg" class="img-fluid rounded shadow-sm gallery-img" alt="Obra" data-bs-toggle="modal" data-bs-target="#imageModal">
        </div>
        <div class="col-md-4">
          <img src="image/obra2.jpg" class="img-fluid rounded shadow-sm gallery-img" alt="Obra" data-bs-toggle="modal" data-bs-target="#imageModal">
        </div>
        <div class="col-md-4">
          <img src="image/obra3.jpg" class="img-fluid rounded shadow-sm gallery-img" alt="Obra" data-bs-toggle="modal" data-bs-target="#imageModal">
        </div>
      </div>
    </div>
  </section>



            <!-- Apenas o próprio usuário pode ver o formulário -->
            <!-- @auth
                @if (auth()->user()->id === $usuario->id)

                    <hr>
                    <h5 class="mt-4">Editar Perfil</h5>

                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" enctype="multipart/form-data" class="text-start">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="foto_perfil" class="form-label">Foto de Perfil</label>
                            <input type="file" name="foto_perfil" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" value="{{ $usuario->nome }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CEP</label>
                            <input type="text" name="cep" class="form-control" value="{{ $usuario->cep }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cidade</label>
                            <input type="text" name="cidade" class="form-control" value="{{ $usuario->cidade }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bairro</label>
                            <input type="text" name="bairro" class="form-control" value="{{ $usuario->bairro }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" name="endereco" class="form-control" value="{{ $usuario->endereco }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="senha" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar Nova Senha</label>
                            <input type="password" name="senha_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-purple">Salvar Alterações</button>
                    </form>
                @endif
            @endauth -->
        </div>
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('Components.footer')