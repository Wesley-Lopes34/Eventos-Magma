<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts do Google -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS boostrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        

    </head>
    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="" class="navbar-brand">
                        <img src="/imgs/logo.png" alt="Eventos Magma" style="width: 75px; margin: 10px;">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Sobre</a>
                        </li>

                    </ul>
                </div>
            </nav>


        </header>

        @yield('content')
        <footer>
            <p>
                Eventos Magma &copy; 2023
            </p>
        </footer>
    </body>
</html>
