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
        <link rel="stylesheet" href="/css/styles.css">

        <!-- CSS boostrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- CSS da aplicação -->

    </head>
    <body>

        <header>
                        <!--Nav bar-->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <div style="position: absolute; top: 24px; left: 90px; color: black;">
                            <h2>Eventos</h2>
                            <h2>Magma</h2>
                        </div>
                            <img src="/imgs/logo.png" alt="Eventos Magma" style="width: 75px; margin: 10px;">
                    </a>
                        
                    <ul class="navbar-nav">
                        <li class="nav-item"> 
                            <a href="/" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Evento</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                           <form action="/logout" method="post">
                                @csrf

<!--Essa é a parte de logout, usando um evento da framework, eu procuro o form mais próximo e fecho ele-->
                                <a href="/logout" class="nav-link" onclick="event.preventDefault(); 
                                this.closest('form').submit();">Sair</a>
                           </form>
                        </li>
                        @endauth

<!--Parte rápida que verifica se caso o usuario esteja logado ou  não, as partes abaixo não apareçam-->
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

            @yield('content')
        <footer>
            <p>
                Eventos Magma &copy; 2025
            </p>
        </footer>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
