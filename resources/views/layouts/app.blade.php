<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appolo</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            font-family: 'Oswald', sans-serif;
            background-color: #ffffff;
            color: #333;
        }

        .container-appolo {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #ffffff;
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .form-area {
            flex: 1;
            background-color: #7D2AE8;
            padding: 4rem 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            color: #fff;
        }

        .form-box h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .form-box label {
            display: block;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .form-box input {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            margin-top: 0.5rem;
        }

        .form-box button {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.75rem;
            background-color: #fff;
            color: #7D2AE8;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            font-weight: bold;
        }

        .footer-icons {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
        }

        .footer-icons i {
            font-size: 1.5rem;
            color: #7D2AE8;
        }

        .brand {
            font-size: 2rem;
            font-weight: bold;
            color: #7D2AE8;
        }
    </style>
</head>
<body>
    <div class="container-appolo">
        <div class="sidebar">
            <div>
                <div class="brand">Appolo</div>
                <div class="nav-links">
                    <a href="#">Solicitantes</a>
                    <a href="#">Artistas</a>
                    <a href="#">Sobre</a>
                </div>
                <div style="margin-top: 2rem;">
                    @yield('left')
                </div>
            </div>

            <div class="footer-icons">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook"></i>
                <i class="fas fa-envelope"></i>
                <i class="fas fa-times"></i>
                <i class="fab fa-linkedin"></i>
            </div>
        </div>

        <div class="form-area">
            @yield('content')
        </div>
    </div>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
