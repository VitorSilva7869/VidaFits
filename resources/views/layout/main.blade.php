<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VidaFits</title>
    <!--Estilo-->
    <link rel="stylesheet" href="/css/main.css">

    @yield('css')
    @yield('js')

    <!--Fonte google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@500&display=swap" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    

    <!--Kit icones-->
    <script src="https://kit.fontawesome.com/8e383bc8aa.js" crossorigin="anonymous"></script>

    <!-- swipper css -->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">

    <!-- Adicione a biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</head>

<body>
<header>
        <nav class="navbar navbar-expand-md mx-sm-5">
            <div class="container-fluid">
                <button id="botaoHam" class="navbar-toggler hamburguer" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-xl "></i>
                </button>
                <div class="sumir div1">
                    <a class="" href="/">
                        <img class="" src="/image/VIDAFIT-removebg-preview.png" alt="" width="120" height="" class="d-inline-block align-text-top">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse justify-content-center div2" id="navbarText">
                    
                    <ul class="nav-link">
                        <li class=""><a  href="/">Home</a></li>
                        <li class=""><a  href="/meditar">Meditar</a></li>
                        <li class=""><a  href="/eventos">Eventos</a></li>
                    </ul>
                </div>
                
                <div class="icone div3">
                    <a href="/pesquisar" class="icone-style-nav">
                        <i class="fa-solid fa-magnifying-glass fa-xl "></i>
                    </a>
                    @if(auth()->check())
                    <div class="btn-group">
                        <button type="button" class=" btn-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user fa-xl"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <div class="container-dropdown">
                                <div class="container-name d-flex align-items-center">
                                    <div class="dropdown-name d-block">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p>{{ auth()->user()->email }}</p>
                                    </div>
                                    <img src="/image/mundo.png" alt="">
                                </div>
                                <li><a href="{{ route('login.destroy') }}"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</a></li>
                            </div>
                        </ul>
                    </div>
                    @else
                    <a href="/login" class="icone-style-nav">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a>
                    @endif
                </div>
            </div>
        </nav>
    </header>



    @yield('conteudo')

    <footer class="pt-5 estilo-footer">
        <div class="container">
            <img src="/image/LogoWhite.png" alt="logo VidaFits" width="130" height="">
            <div class="row mt-2 pb-5 border-bottom border-light">
                <div id="contato" class="col-xl-4 col-lg-4 col-md-4 col-sm-7 col-xs-5 posicao">
                    <p class="ps-1 mt-1">Em um mundo agitado, a VidaFits é o seu refúgio de calma e serenidade.</p>
                </div>
                <div class="col-xl-5 col-lg-4 d-none col-md-4 d-md-block text-lg-center text-md-center">
               
                    <p>Receba informações sobre eventos e promoçoes da VidaFits</p>
                    <form action="">
                        <div class="input-group mb-3 ">
                            <input type="gmail" class="form-control" placeholder="Username@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-light" type="submit" id="button-addon2">Envar</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-xl-1 d-md-none d-xl-block d-sm-block col-sm-4 col-xs-6 ">
                    <p class="text-md-center">Folow US</p>
                    <div class="float-sm-right posicao mt-xs">
                        <a href=""><i class="fa-brands fa-facebook icone-style text-white"></i></a>
                        <a href=""><i class="fa-brands fa-instagram icone-style ml-4 text-white"></i></a>
                        <a href=""><i class="fa-brands fa-twitter icone-style ml-4 text-white mb-3"></i></a>
                    </div>
                    
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-5 col-xs-7 d-md-block">
                    <div class="float-sm-right posicao mt-xs text-lg-center text-md-center">
                        <p>Telefone</p>
                        <p class="fw-bold">(71)9 9136-6331</p>
                        
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 text-center">
                    <p>
                        &copy; Copyright 2023 VidaFits 
                    </p>
                </div>

                <div class="col-6 text-center">
                    <p>
                        PRIVACY POLICY TERMS ADN CONDITIONS
                    </p>
                </div>
            </div>
        </div>
      
    </footer>
</body>
</html>