@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/meditar.css">
@endsection


@section('conteudo')
    
    <section class="container mt-5 pb-5">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <form action="{{route('pesquisar.pesquisar')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisar meditação"><input type="submit" class="btn btn-success" placeholder="Enviar">
                    </div>
                </form>
                @if(empty($search))

                @else
                <p>Termo de busca: {{ $search }}</p>
                @endif

                @if (empty($event))
                    <p>Nenhum produto encontrado.</p>
                @else
                <div class="row row-cols-4 mt-4">
                    @foreach ($event as $events)
                            <div class="col">
                                <div class="card" style="border: none;">
                                    <a href="/eventos/meditar/{{ $events->id}}" class="card-img-top img-card-style">
                                        <img src="/image/{{ $events->imagem }}" alt="">
                                        <p class="minuto">{{ $events->minutos }}</p>
                                    </a>
                                    <div class="card-body">
                                        <div class="body-comentario">
                                            <div class="body-nome">
                
                                            <i class="fa-solid fa-star text-warning mt-2 "></i><span class="text-success ps-1">{{ $events->avaliacao }}</span>
                                            <p class="fw-bold fs-5 mb-0">{{ $events->titulo }}</p>
                                            <span class="ms-2">{{ $events->autor }}</span>
                                                    
                                            </div>
                                        </div>
                                        <p class="mt-3"></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
        
    </section>

@endsection