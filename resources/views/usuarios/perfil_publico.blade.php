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

@php
    $portfolio = Auth::check() ? Auth::user()->portfolioArtista : null;
@endphp




@if ($errors->any())


<div class="modal fade" id="editModalportfolio" tabindex="-1" aria-labelledby="editModalportfolioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    </div>
    </div>
    </div>
@endif

<section class="py-5">
    <div class="container" >
      <div class="row align-items-center">
        <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
          <img src="{{ $usuario->foto_perfil ? asset('storage/' . $usuario->foto_perfil) : asset('imgs/user.jpg') }}" class="rounded-circle border border-4 border-tertiary shadow profile-img" alt="Perfil">
        </div>
        <div class="col-md-9">
          <h1 class="text-nome">{{ $usuario->nome }} </h1>

          @auth
          @if(Auth::user()->tipo_usuario == 2)
          <h3 class="text-nome"> {{ $portfolio->nome_artistico }} </h3> 
            @endif
            @endauth 

          <p class="text-muted"><i class="bi bi-calendar"></i> {{ $usuario->idade }} anos </p>
          <p class="text-muted"><i class="bi bi-geo-alt"></i>  {{ $usuario->cidade ?? 'Localidade não definida' }}  </p>
          <p><strong>Endereço:</strong> {{ $usuario->cep }}  , {{ $usuario->bairro }} , {{ $usuario->endereco }}</p>
          <p class="text-muted">
          <i class="bi bi-brush"></i>
                       {{ $portfolio->descricao ?? 'Descrição do portfólio não disponível' }}
                </p>
                <div class="social-icons my-3">

    <a href="{{$portfolio->link_instagram }}" class="text-primary fs-4 me-3" target="_blank">
      <i class="bi bi-instagram"></i>
    </a>
  
  
    <a href="{{$portfolio->link_behance }}" class="text-primary fs-4 me-3" target="_blank">
      <i class="bi bi-link-45deg"></i>
    </a>
 
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
            @php
              $portfolio = Auth::user()->portfolioArtista ?? null;
            @endphp

                  <button class="btn btn-outline-custom" data-bs-toggle="modal" data-bs-target="#editModalportfolio">
                      <i class="bi bi-pencil"></i>
                  {{ $portfolio ? 'Editar Portfólio' : 'Criar Portfólio' }}
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

        </div>
    </div>
</div>


            <div class="mb-3">
              <label class="form-label">Categorias</label>
              <div class="d-flex flex-wrap gap-2" id="categorias-container">
                <input type="checkbox" class="btn-check" id="teatro" name="categorias" autocomplete="off">
                <label class="btn btn-sm btn-outline-custom" for="teatro">Teatro</label>
              </div>
            </div>
            
            
  <!-- Modal Editar/Criar Portfolio -->


  <div class="modal fade" id="editModalportfolio" tabindex="-1" aria-labelledby="editModalportfolioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ $portfolio ? route('portfolio.update', $portfolio->id) : route('portfolio.store') }}" method="POST">
        @csrf
        @if($portfolio)
            @method('PUT')
        @endif
        <div class="modal-header">
          <h5 class="modal-title" id="editModalportfolioLabel">
            {{ $portfolio ? 'Editar Portfólio' : 'Criar Portfólio' }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nome_artistico" class="form-label">Nome Artístico</label>
            <input type="text" name="nome_artistico" class="form-control" value="{{ $portfolio->nome_artistico ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control">{{ $portfolio->descricao ?? '' }}</textarea>
          </div>
          <div class="mb-3">
            <label for="link_instagram" class="form-label">Link do Instagram</label>
            <input type="text" name="link_instagram" class="form-control" value="{{ $portfolio->link_instagram ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="link_behance" class="form-label">Link Pessoal</label>
            <input type="text" name="link_behance" class="form-control" value="{{ $portfolio->link_behance ?? '' }}">
          </div>
        </div>

        <div class="mb-3">
    <label class="form-label">Categorias Artísticas</label>
    <div class="d-flex flex-wrap gap-2" id="categorias-container" autocomplete="off">
        @foreach ($categorias as $categoria)
            <div class="form-check">
                <input  class="btn-check" type="checkbox" 
                       name="categorias[]" 
                       value="{{ $categoria->id }}"
                       id="categoria_{{ $categoria->id }}"
                       {{ in_array($categoria->id, $categoriasSelecionadas) ? 'checked' : '' }}>
                <label class="btn btn-sm btn-outline-custom"  for="categoria_{{ $categoria->id }}">
                    {{ $categoria->nome }}
                </label>
            </div>
        @endforeach
    </div>
</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-custom">{{ $portfolio ? 'Salvar Alterações' : 'Criar Portfólio' }}</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('Components.footer')