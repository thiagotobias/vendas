<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>NewsApp</title>
        <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet">
    </head>
    <body>
    
        <div class="container">
            <!-- cabeçalho e navegação -->
            @include('site.layouts.nav')

            <!-- conteúdo -->
            @yield('conteudo')

            <!-- rodapé -->
            @include('site.layouts.rodape')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src={{ asset("js/bootstrap.min.js") }}></script>
    </body>
</html>