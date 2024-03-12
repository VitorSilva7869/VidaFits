@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/login.css">
@endsection


@section('conteudo')
    <section class="container">
        <div class="row">
            <div class="col login">
                <div class="login-especifico">
                    <form action="{{ route('cadastrar.store') }}" method="post" class="mx-5">
                        @csrf
                        <div class="d-flex justify-content-center mt-4 mb-2">
                            <div class="rounded-circle" style="width: 100px; height: 100px; background: url(/image/coração.png); background-position: center center; background-size: cover; ">
                                
                            </div>
                        </div>
                        <h3 class="text-center">Cadastrar</h3>
                        <div class="step step-1">
                            <div class="sigle-inputs centrodiv">
                                <input required type="text" class="input"  name="name" id="name" onkeyup="validateEmail()"/>
                                <label for="name"><i class="fa-solid fa-user me-3 ms-2"></i>Nome do usuario</label>
                            </div>  
                            @if($errors->has('name'))
                                <div><p class="danger">{{ $errors->first('name') }}</p></div>
                            @endif
                            <div class="sigle-inputs centrodiv">
                                <input required type="email" class="input"  name="email" id="email" onkeyup="validateEmail()"/>
                                <label for="email"><i class="fa-solid fa-at me-3 ms-2"></i>Email</label>
                            </div>
                            <div><p id="emailMessage" class="danger"></p></div>
                            @if($errors->has('email'))
                                <div><p class="danger">{{ $errors->first('email') }}</p></div>
                            @endif
                            <div class="d-flex justify-content-center mt-4 mb-5">
                                <button onclick="nextStep(2)" id="buttonEmail" class="btn-style px-5" disabled>Avançar<i class="fas fa-arrow-right seta"></i></button>
                            </div>
                        </div>
                        <div class="step step-2">
                            <div class="sigle-inputs centrodiv">
                                <input required type="password" class="input" name="password" id='password' onkeyup="validatePassword()" required /> <!-- Required obriga não estar vazio-->
                                <label for="password"><i class="fa-solid fa-unlock-keyhole me-3 ms-2"></i>Senha</label>
                            </div>
                            <div class="sigle-inputs centrodiv">
                                <input required type="password" class="input" name="" id='password1' onkeyup="validatePassword()" required /> <!-- Required obriga não estar vazio-->
                                <label for="password1"><i class="fa-solid fa-lock me-3 ms-2"></i>Confirma senha</label>
                            </div>
                            <div><p id="message" class="danger"></p></div>
                            <div class="box centrodiv" >
                                <input id="checkbox" type="checkbox">
                                <label for="checkbox">Ver senha</label> <!-- Tem q ligar o "id" com o "For" nos imputs Box e Label-->
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-5 btn-voltar">
                                <button onclick="prevStep()" class="btn btn-outline-light me-5 rounded-circle" ><i class="fa-solid fa-arrow-left"></i></button>

                                <button id="submitButton" type="submit" class="btn-style px-5 ms-4" disabled>Cadastrar<i class="fas fa-arrow-right seta"></i></button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="/login" class="text-center">Fazer login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        let currentStep = 1;
    
        function nextStep(step) {
            document.querySelector(`.step-${currentStep}`).style.display = "none";
            currentStep = step;
            document.querySelector(`.step-${currentStep}`).style.display = "block";
        }
    
        function prevStep() {
            document.querySelector(`.step-${currentStep}`).style.display = "none";
            currentStep = 1;
            document.querySelector(`.step-${currentStep}`).style.display = "block";
        }

        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password1").value;
            const message = document.getElementById("message");
            const submitButton = document.getElementById("submitButton");

            // Verificar se as senhas são iguais
            if (password !== confirmPassword) {
                message.innerHTML = "As senhas não coincidem.";
                submitButton.disabled = true;
                return;
            }

            // Verificar se a senha tem pelo menos 8 caracteres
            if (password.length < 8) {
                message.innerHTML = "A senha deve conter 8 caracteres.";
                submitButton.disabled = true;
                return;
            }

            // Verificar se a senha contém pelo menos um número e uma letra
            const hasNumber = /\d/.test(password);
            const hasLetter = /[a-zA-Z]/.test(password);

            if (!hasNumber || !hasLetter) {
                message.innerHTML = "A senha deve conter numeros e letras.";
                submitButton.disabled = true;
                return;
            }

            // Se todas as verificações passarem, a senha é válida
            message.innerHTML = "";
            submitButton.disabled = false;

        }
        function validateEmail() {
        const email = document.getElementById("email").value;
        const emailMessage = document.getElementById("emailMessage");
        const submitButton = document.getElementById("buttonEmail");
        const name = document.getElementById("name").value;

        // Verificar se o email termina com as extensões válidas e tem menos de 50 caracteres
        const validEmails = ["@gmail.com", "@hotmail.com", "@yahoo.com"];
        const isValidEmail = validEmails.some(ext => email.endsWith(ext));
        const isEmailLengthValid = email.length < 50;
        
        const isNameValid = /^[a-zA-Z\s]+$/.test(name) && name.length >= 5 && name.length <= 30;

        if (isValidEmail && isEmailLengthValid) {
            emailMessage.innerHTML = "";
        } else {
            emailMessage.innerHTML = "Email inválido.";
        }
        if(isNameValid){
            emailMessage.innerHTML = "";
        }else{
            emailMessage.innerHTML = "Nome entre (5 a 30) caracteres sem Ñ";

        }
        
        // Habilitar o botão de envio se a senha e o email forem válidos
        submitButton.disabled = !(isValidEmail && isEmailLengthValid && isNameValid);
    }
    </script>
@endsection