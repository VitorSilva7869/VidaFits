//time
let timerInterval;
let timerMinutes = 0;
let timerSeconds = 0;
let isPaused = false;
let tempoTotal = 0;
let tempoRestante = 0;
const audio = document.getElementById("myAudio");
const dispertador = document.getElementById("dispertador");

function startTimer(minutes) {
    if (timerInterval) {
        clearInterval(timerInterval);
    }
    timerMinutes = minutes;
    timerSeconds = 0;
    updateTimerDisplay();
    tempoTotal = timerMinutes * 60 + timerSeconds; // Define o tempo total
    tempoRestante = tempoTotal; // Inicializa o tempo restante

    timerInterval = setInterval(updateTimer, 1000);
    isPaused = false;
    document.getElementById("play").style.display = 'none'
    document.getElementById("returnButton").style.display = "none";
    
    document.getElementById("returnPause").style.display = "inline-block";
    document.getElementById("returnStop").style.display = "inline-block";

    //iniciar audio
    audio.currentTime = 0;
    audio.play();
    
}

function pauseTimer() {
    clearInterval(timerInterval);
    isPaused = true;
    document.getElementById("returnButton").style.display = "inline-block";
    document.getElementById("returnPause").style.display = "none";

    //Pausar audio
    audio.pause();

}

function returnTimer() {
    timerInterval = setInterval(updateTimer, 1000);
    isPaused = false;
    document.getElementById("returnButton").style.display = "none";
    document.getElementById("returnPause").style.display = "inline-block";

    //iniciar audio
    audio.play();
}

function stopTimer() {
    clearInterval(timerInterval);
    timerMinutes = 0;
    timerSeconds = 0;
    updateTimerDisplay();

    document.getElementById("returnPause").style.display = "none";
    document.getElementById("returnStop").style.display = "none";

    document.getElementById("play").style.display = 'inline-block'



    //Pausar audio
    audio.currentTime = 0;
    audio.pause();

    //Voltar ao inicio o circulo
    const circle = document.querySelector('#circleProgress');
    circle.style.strokeDashoffset = 570 ;

}

function updateTimer() {
    if (isPaused) return;

    if (timerMinutes === 0 && timerSeconds === 0) {
        clearInterval(timerInterval);
        //encerrar audio audio
        audio.currentTime = 0;
        audio.pause();

        //sumir os botoes
        document.getElementById("returnPause").style.display = "none";
        document.getElementById("returnStop").style.display = "none";

        //dispertador
        dispertador.play();

    } else if (timerSeconds === 0) {
        timerMinutes--;
        timerSeconds = 59;
    } else {
        timerSeconds--;
    }
    updateTimerDisplay();

    // Calcula a porcentagem concluída com base no tempo restante
    const porcentagem = ((tempoTotal - tempoRestante) / tempoTotal) * 100;

    // Atualiza o strokeDashoffset com a porcentagem calculada
    const circle = document.querySelector('#circleProgress');
    circle.style.strokeDashoffset = (570 * (100 - porcentagem)) / 100;
    
    tempoRestante--; // Atualiza o tempo restante
}

function updateTimerDisplay() {
    const timerDisplay = document.getElementById("timer");
    const minutesStr = timerMinutes.toString().padStart(2, "0");
    const secondsStr = timerSeconds.toString().padStart(2, "0");
    timerDisplay.textContent = `${minutesStr}:${secondsStr}`;
}

//musica e narração

let isMusicPaused = false; // Variável de controle para saber se a música está pausada

function pauseMusic() {
    const audio = document.getElementById("myAudio");
    const returnMusicButton = document.getElementById("returnMusic");
    const returnMusic1Button = document.getElementById("returnMusic1");

    if (isMusicPaused) {
        audio.play(); // Retoma a música
        returnMusicButton.style.display = "none";
        returnMusic1Button.style.display = "inline-block";
    } else {
        audio.pause(); // Pausa a música
        returnMusicButton.style.display = "inline-block";
        returnMusic1Button.style.display = "none";
    }

    isMusicPaused = !isMusicPaused; // Inverte o estado da variável de controle
}


function pauseGuiada() {
    const audio = document.getElementById("myAudio");
    const returnVollButton = document.getElementById("returnVoll");
    const returnVoll1Button = document.getElementById("returnVoll1");

    if (isMusicPaused) {
        audio.play(); // Retoma a música
        returnVollButton.style.display = "none";
        returnVoll1Button.style.display = "inline-block";
    } else {
        audio.pause(); // Pausa a música
        returnVollButton.style.display = "inline-block";
        returnVoll1Button.style.display = "none";
    }

    isMusicPaused = !isMusicPaused; // Inverte o estado da variável de controle
}

function largura(){
    var larguraDaTela = window.innerWidth;
    return larguraDaTela;
}

window.onload = function() {
    var div = document.getElementById("meditar");
    var larguraDaTela = largura();
    
    if(larguraDaTela > 768){
        div.classList.add("meditar");
    }
    
    return larguraDaTela;
};

window.onscroll = function () {
    var div = document.getElementById("meditar");
    var div2 = document.getElementById("meditar-2");
    var larguraDaTela = largura();
    var scrollPosition = window.scrollY;
    
    if(larguraDaTela > 768){
        var scrollThreshold = 1025;
    
        if (scrollPosition > scrollThreshold) {
            div.classList.remove("meditar");
            div2.classList.remove("container-scroll");
            div2.classList.add("meditar-top");
        } else {
            div2.classList.remove("meditar-top");
            div2.classList.add("container-scroll");
            div.classList.add("meditar");
        }
    }
    // Defina a posição de rolagem onde deseja que a div volte à posição normal
};

//star
let estrelas = document.querySelectorAll(".star");
let estrelaClicada = null;

function acenderEstrelas(e) {
    apagarEstrelas();

    let index = Array.from(estrelas).indexOf(e.target);

    for (let i = index; i >= 0; i--) {
        estrelas[i].classList.add("ativa");
    }
}

function apagarEstrelas() {
    estrelas.forEach(function (estrela) {
        if (estrela !== estrelaClicada) {
            estrela.classList.remove("ativa");
        }
    });
}

function clicarEstrela(e) {
    estrelaClicada = e.target;
    
}
  
function comentariosMais() {
    window.location.href = 'comentarioMais.html';
}