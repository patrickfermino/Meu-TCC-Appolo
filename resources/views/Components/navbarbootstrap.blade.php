
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Appolo')</title>
    <link  href="css/navbar.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



    
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand me-auto " href="home">Appolo</a>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"> Appolo </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-left flex-grow-1 pe-3">
  
          <li class="nav-item">
            <a class="nav-link mx-lg-2" aria-current="page" href="{{ route('usuarios.publico') }}">Artistas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="solicitantes">Solicitantes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#">Sobre</a>
          </li>

        </ul>

        
  <div class="d-flex justify-content-end gap-2 mt-auto position-relative bottom-0 end-0 p-3">
 

  @php
    $user = Auth::user();
@endphp

  @auth

  <div class="actions d-flex gap-2">
    @if(Auth::user()->tipo_usuario == 2)
          <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#postModal">
            <i class="bi bi-plus-circle"></i> Post
          </button>
          @endif

          <button class="btn btn-outline-custom" data-bs-toggle="modal" data-bs-target="#editModal">
            <i class="bi bi-pencil"></i> Editar perfil
          </button>

  <div class="dropdown ms-3">
    <button class="btn btn-primary-custom dropdown-toggle" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
      {{ Auth::user()->nome }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
    <li><a class="dropdown-item" href="{{ route('usuarios.perfilPublico', Auth::user()->id) }}">Perfil</a></li>

      <li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="dropdown-item" type="submit">Sair</button>
        </form>
      </li>
    </ul>
  </div>

 

@else
  <li class="botao-nav" id="li-nav"><a class="btn btn-primary-custom ms-3" data-bs-toggle="modal" data-bs-target="#cadastroModal">Cadastrar-se</a></li>
  <li class="botao-nav" id="li-nav"><a class="btn btn-primary-custom ms-3" href="{{ route('login') }}">Entrar</a></li>
@endauth

</div> 

      </div>
    </div>

    

<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- 
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
</button> -->


    

  </div>
</nav>


<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

      <div class="modal-body button-group" >

      <li class="botao-nav" id="li-nav"><a class="btn btn-primary-custom ms-3" href="cadastro/artista">Cadastro Artista</a></li>
      <li class="botao-nav" id="li-nav"><a class="btn btn-primary-custom ms-3" href="cadastro/contratante">Cadastro Solicitante</a></li>

      </div>
      </div>
    </div>
  </div>



@auth


  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="editModalLabel">Editar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('usuarios.update', Auth::user()->id) }}" enctype="multipart/form-data" class="text-start">
                        @csrf
                        @method('PUT')


                        <div class="mb-3">
                            <label for="foto_perfil" class="form-label">Foto de Perfil</label>
                            <input type="file" name="foto_perfil" class="form-control">
                        </div>

                        <div class="mb-3">
                          <label for="nome" class="form-label">Nome</label>
                           <input type="text" class="form-control" value="{{  Auth::user()->nome }}" name="nome" placeholder="Seu nome completo">
                         </div>
          
            <div class="mb-3">
              <label class="form-label">Gênero</label>
              <div class="d-flex flex-wrap gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="masculino">
                  <label class="form-check-label" for="masculino">
                    Masculino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="feminino">
                  <label class="form-check-label" for="feminino">
                    Feminino
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="naoInformar">
                  <label class="form-check-label" for="naoInformar">
                    Não informar
                  </label>
                </div>
              </div>
            </div>
            
            <div class="mb-3">
                            <label class="form-label">CEP</label>
                            <input type="text" name="cep" class="form-control" value="{{  Auth::user()->cep }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cidade</label>
                            <input type="text" name="cidade" class="form-control" value="{{  Auth::user()->cidade }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bairro</label>
                            <input type="text" name="bairro" class="form-control" value="{{ Auth::user()->bairro }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" name="endereco" class="form-control" value="{{  Auth::user()->endereco }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="senha" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar Nova Senha</label>
                            <input type="password" name="senha_confirmation" class="form-control">
                        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary-custom">Confirmar</button>

        </form>
        </div>
      </div>
    </div>
  </div>
  


  @auth
    @if(Auth::user()->tipo_usuario == 2)

  <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title nav-link" id="postModalLabel">Novo Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
              @csrf


              <div class="mb-3">
                <label for="nome" class="form-label">Título</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Título do seu post">
              </div>


              <div class="mb-4">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva sua obra"></textarea>
              </div>



              <div class="mb-3">
                <label for="imagens" class="form-label">Imagens</label>
                <input class="form-control" type="file" name="imagens[]" id="imagens" multiple>
              </div>

            

              
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary-custom">Publicar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div> 


@endif

  @endauth

  @endauth


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
