@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/comentarioMais.css">
@endsection


@section('conteudo')
    
    <section class="container mt-4" id="comentario">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <button type="submit" class="btn-style-mais" onclick="voltar()" ><i class="fa-solid fa-arrow-left"></i></button>
                    </div>
                    <h1 class="mb-4 text-dark">Opiniões do evento</h1>
                    <div></div>
                </div>
                <div class="d-flex">
                    <h1 class="me-3">{{$evento->avaliacao}}</h1>
                    <div class="">
                        @php
                            $comentariosAudio = $evento->comentarios;
                            $numeroAvaliacoes = $comentariosAudio->count();
                            $inteiroAvaliação = intval($evento->avaliacao);
                        @endphp
                        @for($i = 0; $i < $inteiroAvaliação; $i++)
                            <i class="fa-solid fa-star" aria-hidden="true"></i> 
                            
                        @endfor
                        <div>
                            <span>{{$numeroAvaliacoes}} Avaliações</span>
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
                <div class="d-flex align-items-center mb-4">
                    <p>1</p><i class="fa-solid fa-star ms-1"></i>
                </div>
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
                <h3 class="mb-3">Comentarios:</h3>
                @foreach($evento->comentarios ?? [] as $comentario)
                <div class="mb-4">
                    <div class="body-comentario">
                        <img src="imagens/coração.png" alt="">
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
    </section>
<script>
    function voltar(){
    window.location.href = '/eventos/meditar/{{ $evento->id}}';
}
</script>
@endsection