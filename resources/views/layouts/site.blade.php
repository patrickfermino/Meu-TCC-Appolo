<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Appolo')</title>
    


</head>
<body>

    <div class="main-container">
        <!-- Lado esquerdo -->
    

            <div class="content">
                @yield('illustration')
  
        </div>

        <!-- Lado direito -->
        <div class="right-side">
            <div class="form-container">
                <h2 class="form-title">@yield('form-title')</h2>
                @yield('form')
            </div>
        </div>
    </div>

</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>