
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
            <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Artistas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#">Solicitantes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#">Sobre</a>
          </li>

        </ul>

        
  <div class="d-flex justify-content-end gap-2 mt-auto position-relative bottom-0 end-0 p-3">

    <li class="botao-nav" id="li-nav" ><a class="btn btn-outline-custom ms-3" href="{{ route('usuarios.createArtista') }}">Cadastrar-se</a></li>
   
    <li class="botao-nav" id="li-nav"><a class="btn btn-primary-custom ms-3 " href="{{ route('login') }}">Entrar</a></li>

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











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
