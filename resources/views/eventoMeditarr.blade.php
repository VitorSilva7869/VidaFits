 
@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/eventoMeditar.css">
@endsection


@section('conteudo')


    <section class="container mt-5 d-lg-block d-none">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" style="border-radius: 25px;" src="/image/{{$evento->imagem}}" alt="">
            </div>
            
        </div>
    </section>

    <section class="mt-3">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-md-6 order-md-4" id="meditar">
                    <h1 class="mb-3 d-md-none">{{$evento->titulo}}</h1>
                    <div class="container-scroll" id="meditar-2">
                        <div class="d-flex justify-content-between mt-3" id="meditar-2">
                            <button class="btn-style" onclick="pauseMusic()"><i id="returnMusic1" class="fa-solid fa-music"></i><i id="returnMusic" style="display: none" class="fa-solid fa-radio"></i></button>
                            <button class="btn-style" onclick="pauseGuiada()"><i id="returnVoll1" class="fa-solid fa-volume-high"></i><i id="returnVoll" style="display: none" class="fa-solid fa-volume-xmark"></i></button>
                        </div>
                        <div class="box d-flex flex-column align-items-center" id="meditar-3">
                            <div class="box-circle">
                                <svg>
                                    <circle cx="90" cy="90" r="90"></circle>
                                    <circle id="circleProgress" cx="90" cy="90" r="90"></circle>
                                </svg>
                                <h2 id="timer" class="number">00:00</h2>
                            </div>
                            <div class="mat-3">
                                <button class="btn-style px-sm-4 me-sm-1 mt-4" id="play" onclick="startTimer(1)">COMEÇAR <i class="ms-2 fa-solid fa-play"></i></button>
                            </div>
                            <div class="mt-4">
                                <button class="btn-style" onclick="pauseTimer()" id="returnPause" style="display: none"><i class="fa-solid fa-pause"></i></button>
                                <button class="btn-style" onclick="returnTimer()" id="returnButton" style="display: none"><i class="fa-solid fa-play"></i></button>
                                <button class="btn-style" onclick="stopTimer()" id="returnStop" style="display: none"><i class="fa-solid fa-stop"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-1" id="box2">
                    <h1 class="mb-0 d-none d-md-block tamanho">{{$evento->titulo}}</h1>
                    <span class="span ms-3">by {{$evento->autor}}</span><br>
                    <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">4.5</span> 
                    <i class="fa-solid fa-music ms-3"></i><span class="ms-1">{{$evento->minutos}}</span>
                    <p>{{$evento->descricao}}
                    </p>
                    <div style="background: #dffea5; margin: 30px 15px; height: 1px;"></div>

                </div>
                <div class="col-md-6 order-md-2"></div>
                <div class="col-12 col-md-6 order-md-3" id="box3">
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-3">Recente Reviews</h2>
                        <div class="d-none d-md-block">
                            <button type="submit" class="btn-style-mais" data-bs-toggle="modal" data-bs-target="#modal-comentario">Ver mais<i class="fas fa-arrow-right seta"></i></button>
                        </div>
                        <div class="d-md-none">
                            <button type="submit" class="btn-style-mais" onclick="comentariosMais()" >Ver mais<i class="fas fa-arrow-right seta"></i></button>
                        </div>
                    </div>
                    <div class="row  row-cols-2 ">
                        @php
                            $contador = 0;
                        @endphp
                        @foreach($evento->comentarios ?? [] as $comentario)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="body-comentario">
                                        <img src="imagens/coração.png" alt="">
                                        <div class="body-nome">
                                            @php
                                                $idUserAudio = $comentario->users_id
                                            @endphp
                                            <p class="mb-0">@if($userId == $idUserAudio) Você @else {{optional($comentario->users)->name}} @endif</p>
                                            @for($i = 0; $i < $comentario->estrela; $i++)
                                            <i class="fa-solid fa-star" aria-hidden="true"></i> 
                                                
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mt-3">{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                        </div>
                        @if($contador == 3)
                            @break
                            @endif
                            @php
                            $contador++;
                            @endphp
                        @endforeach
                    </div>
                    <form action="\enviarComentario{{$evento->id}}" method="post">
                        @csrf
                        <div class="input-group mb-1 textarea-style">
                            <input type="submit" class="btn-style-comentario" placeholder="Enviar">
                            <textarea class="form-control" name="comentario" placeholder="Comente sua experiencia do evento..."></textarea>
                        </div>
                        <div class="text-center star-style">
                            <label for="estrela1" onclick="clicarEstrela(event)" onmouseover="acenderEstrelas(event)" onmouseout="apagarEstrelas()"><i class="star fa-solid fa-star ms-2" ></i></label>
                            <label for="estrela2" onclick="clicarEstrela(event)" onmouseover="acenderEstrelas(event)" onmouseout="apagarEstrelas()"><i class="star fa-solid fa-star"></i></label>
                            <label for="estrela3" onclick="clicarEstrela(event)" onmouseover="acenderEstrelas(event)" onmouseout="apagarEstrelas()"><i class="fa-solid fa-star star" ></i></label>
                            <label for="estrela4" onclick="clicarEstrela(event)" onmouseover="acenderEstrelas(event)" onmouseout="apagarEstrelas()"><i class="fa-solid fa-star star" ></i></label>
                            <label for="estrela5" onclick="clicarEstrela(event)" onmouseover="acenderEstrelas(event)" onmouseout="apagarEstrelas()"><i class="fa-solid fa-star star" ></i></label>
                        </div>
                        <input type="radio" class="estrela-radio" name="radio_estrela" id="estrela1" value="1" />
                        <input type="radio" class="estrela-radio" name="radio_estrela" id="estrela2" value="2" />
                        <input type="radio" class="estrela-radio" name="radio_estrela" id="estrela3" value="3" />
                        <input type="radio" class="estrela-radio" name="radio_estrela" id="estrela4" value="4" />
                        <input type="radio" class="estrela-radio" name="radio_estrela" id="estrela5" value="5" />
                    </form>
                </div>
                
            </div>
            <div class="row">
            </div>
        </div>
    </section>

    <div class="modal fade  " id="modal-comentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 900px;">
          <div class="modal-content">
            <div class="modal-header shadow-sm">
              <h4 class="modal-title ms-4" id="exampleModalLabel">Opiniões do evento</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex">
                                <h1 class="me-3">3.5</h1>
                                <div class="">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <div>
                                        <span>14 avaliações</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>5</p><i class="fa-solid fa-star ms-1"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>4</p><i class="fa-solid fa-star ms-1"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>3</p><i class="fa-solid fa-star ms-1"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>2</p><i class="fa-solid fa-star ms-1"></i>
                            </div>
                            <div class="d-flex align-items-center">
                                <p>1</p><i class="fa-solid fa-star ms-1"></i>
                            </div>
                            
                        </div>
                        <div class="col-8">
                            @if($ComentarioUser->isEmpty())
                            
                            @else
                            <h3 class="mb-3">Seus comentarios:</h3>
                            @foreach($ComentarioUser as $comentario)
                                <div class="mb-4">
                                    <div class="body-comentario">
                                        <img src="/image/coração.png" alt="">
                                        <div class="body-nome">
                                            <p class="mb-0">Você</p>
                                            @for($i = 0; $i < $comentario->estrela; $i++)
                                            <i class="fa-solid fa-star ms-1"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="mt-2">{{ $comentario->comentario }}</p>
                                </div>
                            @endforeach
                            @endif
                                <h3 class="mb-3">comentarios:</h3>
                            @foreach($evento->comentarios ?? [] as $comentario)
                                <div class="mb-4">
                                    <div class="body-comentario">
                                        <img src="/image/coração.png" alt="">
                                        <div class="body-nome">
                                            @php
                                                $idUserAudio = $comentario->users_id
                                            @endphp
                                            <p class="mb-0">@if($userId == $idUserAudio) Você @else {{optional($comentario->users)->name}} @endif</p>
                                            @for($i = 0; $i < $comentario->estrela; $i++)
                                            <i class="fa-solid fa-star ms-1"></i>
                                            @endfor

                                        </div>
                                    </div>
                                    <p class="mt-2">{{ $comentario->comentario ?? 'Sem Comentário' }}</p>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    
<script src="/js/eventoMeditarScript.js"></script>

@endsection