<!-- página que lista os contratantes que mais realizaram interações na plataforma -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Appolo - Locais</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Medula+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .navbar-brand {
    font-family: 'Medula One', cursive;
    font-size: 2.5rem; 
    color: #8000ff !important;
  }

    .nav-link {
      color: #8000ff !important;
      margin: 0 10px;
    }
    .search-input {
      border: 2px solid #8000ff;
      border-radius: 25px;
      padding: 0.3rem 1rem;
      outline: none;
    }
    .search-icon {
      color: #8000ff;
      margin-left: -30px;
    }
    .dropdown-toggle {
      border: 2px solid#8000ff;
      border-radius: 20px;
      padding: 6px 12px;
      color: #000;
    }
    .dropdown-menu {
      padding: 10px;
    }
    .rating i {
      color: #8000ff;
      margin-left: 4px;
    }
    .rating span {
      margin-left: 5px;
    }
    .estabelecimento {
      border-bottom: 2px solid#8000ff;
      padding: 1rem 0;
    }
    .footer {
      background-color: #8000ff;
      color: white;
      padding: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    .footer .social-icons i {
      margin: 0 10px;
      font-size: 20px;
      color: white;
    }
    .footer .logo-footer {
      font-family: 'Medula One', cursive;
      font-size: 24px;
    }

    html, body {
  height: 100%;
  margin: 0;
  display: flex;
  flex-direction: column;
}

body > .container {
  flex: 1; 
  padding-top: 100px !important ; 
}

  </style>
</head>
<body>
    
@include('Components.navbarbootstrap')


  <div class="container my-4">
    <div class="estabelecimento row align-items-center">
      <div class="col-md-1"><img src="img/nacoes.jpg" class="img-fluid rounded-circle" width="60"></div>
      <div class="col-md-8">
        <strong>Nações Shopping</strong><br>
        Criciúma, SC<br>
        Centro comercial
      </div>
      <div class="col-md-3 text-end">
        <div class="rating">
          <strong>4,9</strong> <i class="fas fa-star"></i><span>96 avaliações</span>
        </div>
      </div>
    </div>
    <div class="estabelecimento row align-items-center">
      <div class="col-md-1"><img src="img/lanche.jpg" class="img-fluid rounded-circle" width="60"></div>
      <div class="col-md-8">
        <strong>Madero Container Criciúma</strong><br>
        Criciúma, SC<br>
        Restaurante
      </div>
      <div class="col-md-3 text-end">
        <div class="rating">
          <strong>4,7</strong> <i class="fas fa-star"></i><span>68 avaliações</span>
        </div>
      </div>
    </div>
    <div class="estabelecimento row align-items-center">
      <div class="col-md-1"><img src="img/prefeitura.jpg" class="img-fluid rounded-circle" width="60"></div>
      <div class="col-md-8">
        <strong>Prefeitura de Criciúma</strong><br>
        Criciúma, SC<br>
        Instituição
      </div>
      <div class="col-md-3 text-end">
        <div class="rating">
          <strong>4,0</strong> <i class="fas fa-star"></i><span>269 avaliações</span>
        </div>
      </div>
    </div>
  </div>

 
  @include('Components.footer')
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>