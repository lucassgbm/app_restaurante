<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@900&family=Roboto:wght@100:900&display=swap" rel="stylesheet">

    <!-- Bootstrap | CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="../css/app.css" media="screen" /> --}}
    <link rel="stylesheet" type="text/css" href="../css/site.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/slider_agile.css" media="screen" />

    <!-- Javascript -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <title>Site Demo</title>
  </head>

 
  <body>

  <div id="app">

    <!-- Slider main container -->
    <section class="header">
        <header class="header-site">
            <div class="container">
                
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="col">

                    <div class="logo logo_header">
                        <img src="{{ asset('img/logo_site_header.png')}}">
                    </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <div class="col">
                            <ul class="navbar-nav">
                            
                                <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Preços</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Desenvolvedores</a></li>
                                
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="navbar-nav">
                                {{-- Busca --}}
                                    <li class="nav-item">
                                        <input class="form-control form-control-sm input-search" type="text" placeholder="" aria-label=".form-control-sm">
                                    </li>

                                    <li class="nav-item"><a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></a>
                                    </li>
                                {{-- Fim - busca --}}
                                <li class="nav-item"><a href="#" class="nav-link">Ajuda</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link">
                                        <button type="button" class="btn btn-outline-danger">Começar</button>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            
        </header>
        <div class="swiper-wrapper">
            {{-- componente para o Slider --}}
            <slider-component></slider-component>
      
        </div>
    </section>
    <section class="clientes">
        <div class="container">

            {{-- componente para Clientes --}}
            <clientes-component></clientes-component>
            
        </div>
    </section>
    <section class="blank">
    </section>
    <section class="servicos">
        <div class="container">

            {{-- componente para Serviços --}}
            <servicos-component></servicos-component>

        </div>
    </section>
    <section class="blank">
    </section>
    <section class="atendimento_cliente">
        <div class="container">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h4 class="display-7 fw-bold">Atendimento ao Cliente</h4>
                    <p class="lead">Precisando entrar em contato, utilize nossos canais de atendimento ou consulte a documentação para mais informações.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-success btn-lg px-4 me-md-2">Envie um ticket</button>
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Documentação</button>
                        
                    </div>

                </div>
            </div>

        </div>
    </section>
    <section class="newsletter">
        <div class="px-4 py-5 my-5 text-center">
            <h4 class="display-7 fw-bold">Newsletter</h4>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Receba nossas informações por email e fique sabendo de todas as novidades</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                <input type="text" class="form-control" id="email" placeholder="Seu e-mail">
                <button type="button" class="btn btn-primary btn-lg px-4">Salvar</button>
            </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
                <div class="col flex-wrap">
                
                    <div class="logo logo_footer">
                        <img src="{{ asset('img/logo_site_footer.png')}}">
                    </div>
                </div>
                <div class="col flex-wrap">
                    <ul class="nav me-auto">
                            
                        
                        <li class="ms-3"><a class="text-muted" href="#">Home</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">Sobre</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">Preços</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">Desenvolvedores</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">Ajuda</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">Contato</a></li>
                            
                        
                    </ul>
                </div>
                <div class="col flex-wrap">
                    <ul class="nav me-auto">
                        <li class="ms-3"><a class="text-muted" href="#">+80 1234-5678</a></li>
                        <li class="ms-3"><a class="text-muted" href="#">ola@sitedemo.com.br</a></li>
                    </ul>
                </div>

                
            </footer>
        </div>
    </section>
        
    </div>
  </div> 
  {{-- fim - body --}}




  </body>
</html>