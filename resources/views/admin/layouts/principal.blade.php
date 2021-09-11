<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      

    <title>Aluguel de veículos</title>
</head>
<body>
    
    <!-- Menu topo-->
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Alugel</a>
                <ul class="right">
                    <li>
                        <a href="#">Carros</a>
                    </li>
                    <li>
                        <a href="#">Motos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteudo principal-->
    <div class="container">
        @yield('conteudo-principal')
    </div>


        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</body>
</html>