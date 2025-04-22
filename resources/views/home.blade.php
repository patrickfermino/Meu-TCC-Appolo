<!-- Página home da aplicação, mostrando  um panorama geral sobre o que se trata a plataforma -->
@extends('Components.navbarbootstrap')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="css/home.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  
<head> 


<main>
  <section class="hero-section d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-left align-items-center ">
          <h2 class="hero-text mb-4">
            Cadastre-se agora e permita que sua criatividade seja livre,
            pois cada traço, cor e ideia que você expressa tem o poder de inspirar o mundo.
          </h2>
          <a class="btn btn-primary-custom big-btn mx-auto w-auto "  href="#"> Contrate um artista !</a>
        </div>
        <div class="col-md-6 text-center">
          <img src="imgs/banner.jpg" alt="Background" class="img-fluid" style="max-height: 700px;" />
        </div>


      </div>
    </div>
  </section>
</main>

@include('Components.footer')

</section> 

</head> 