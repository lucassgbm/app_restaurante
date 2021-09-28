<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@900&family=Roboto:wght@100:900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="../css/app.css" media="screen" /> --}}
    <link rel="stylesheet" type="text/css" href="../css/site.css" media="screen" />
    <script src="{{ asset('js/app.js') }}" defer></script>




    <title>Hello, world!</title>
  </head>

    {{-- SWIPER --}}
  <link  rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            });
    </script>
  <body>

  <div id="app">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

    <!-- Slider main container -->
    <section class="swiper">
        <header class="header-site">
            <div class="container">
                
                <nav class="py-2 mt-2">
                    <div class="container d-flex flex-wrap">
                        <div class="logo logo_header">
                            <img src="{{ asset('img/logo_site_header.png')}}">
                        </div>
                        <ul class="nav me-auto">
                            
                            <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Preços</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Desenvolvedores</a></li>
                            
                        </ul>
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="nav-link">Ajuda</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <button type="button" class="btn btn-outline-danger">Começar</button>
                                </a>
                            </li>
                            


                        </ul>
                    </div>
                </nav>
            </div>
            
        </header>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
            
                <div class="px-4 py-5 my-5 mt-10 text-center">
                    <h1 class="display-5 fw-bold">Bem vindo ao SiteDemo</h1>
                    <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Sobre o SiteDemo</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Começar</button>
                    </div>
                    </div>
                </div>
            
            </div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        {{-- <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div> --}}
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