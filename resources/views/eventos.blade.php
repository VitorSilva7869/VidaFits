@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/eventos.css">
@endsection


@section('conteudo')
    <section class="container">
        <div class="row">
            <div class="col">
                <h1 class="ms-5 mb-3 mt-3">Essenciais</h1>
                <div class="container-carrossel swiper">
                    <div class="carrossel-content">
                        <div class="swiper-wrapper">
                            @foreach($evento as $event)
                            <div class="swiper-slide card-carrossel">
                                <a href="/eventos/meditar/{{ $event->id}}" class="img-carrossel">
                                    <img src="/image/{{ $event->imagem}}" alt="">
                                    <p class="minuto">{{ $event->minutos}}</p>
                                </a>
                                <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">1</span>
                                <p class="fw-bold fs-5 mb-0">{{ $event->titulo}}</p>
                                <span class="ms-2">{{ $event->autor}}</span>
                            </div>
                            @endforeach
                            
                            </div>
                            <div class="swiper-button-next" id="swiper-navBtn"></div>
                            <div class="swiper-button-prev" id="swiper-navBtn"></div>
                            <div class="swiper-pagination"></div>
                    </div>
                </div>
                <h1 class="ms-5 mb-3 mt-3">Essenciais</h1>
                <div class="container-carrossel swiper">
                    <div class="carrossel-content">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide card-carrossel">
                            <a href="eventoMeditar.html" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          <div class="swiper-slide card-carrossel">
                            <a href="#" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          <div class="swiper-slide card-carrossel">
                            <a href="#" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          <div class="swiper-slide card-carrossel">
                            <a href="#" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          <div class="swiper-slide card-carrossel">
                            <a href="#" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          <div class="swiper-slide card-carrossel">
                            <a href="#" class="img-carrossel">
                                <img src="imagens/Meditação3.jpg" alt="">
                                <p class="minuto">18m</p>
                            </a>
                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span>
                            <p class="fw-bold fs-5 mb-0">Alivie Ansiedade em tempos de turbulencia</p>
                            <span class="ms-2">Vitor Silva</span>
                          </div>
                          
                          
                        </div>
                        <div class="swiper-button-next" id="swiper-navBtn"></div>
                        <div class="swiper-button-prev" id="swiper-navBtn"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- swiper JS -->
<script src="/js/swiper-bundle.min.js"></script>

<!-- javaScript -->
<script src="/js/eventosSript.js"></script>

@endsection