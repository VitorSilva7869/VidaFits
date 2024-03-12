@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/login.css">
@endsection


@section('conteudo')
<section class="container">
        @if(isset($sucesso))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Cadastro realizado com sucesso.</strong> Primeiramente entre na conta criada para desbravar a VidaFits
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(isset($destroy))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong>Voce saiu da sua conta</strong> Conecte-se novamente abaixo
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif 

        <div class="row">
            <div class="col login">
                <div class="login-especifico">
                    <form action="{{ route('login.loginValidate') }}" method="post" class="mx-5">
                        @csrf
                        <div class="d-flex justify-content-center mt-4 mb-2">
                            <div class="rounded-circle" style="width: 100px; height: 100px; background: url(/image/mundo.png); background-position: center center; background-size: cover; ">
                                
                            </div>
                        </div>
                        <h3 class="text-center">Login</h3>
                        <div class="sigle-inputs centrodiv">
                            <input required type="text" class="input"  name="email" id="email"/>
                            <label for="email"><i class="fa-solid fa-user me-3 ms-2"></i>Email</label>
                        </div>
                        <div class="sigle-inputs centrodiv">
                            <input required type="password" class="input" name="password" id='password2' required /> <!-- Required obriga não estar vazio-->
                            <label for="password2"><i class="fa-solid fa-lock me-3 ms-2"></i>Senha</label>
                        </div>
                        @if($mensagem = Session::get('error'))
                        <div><p class="danger">{{$mensagem}}</p></div>
                        @endif
                        <div class="box centrodiv" >
                            <input id="checkbox" name="remember" type="checkbox">
                            <label for="checkbox">Lembrar senha</label> <!-- Tem q ligar o "id" com o "For" nos imputs Box e Label-->
                        </div>
                        <div class="d-flex justify-content-center mt-4 mb-5">
                            <button type="submit" class="btn-style px-5">Avançar<i class="fas fa-arrow-right seta"></i></button>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="/cadastrar" class="text-center">Criar uma conta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection