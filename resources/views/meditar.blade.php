@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="/css/meditar.css">
@endsection


@section('conteudo')
    <audio id="myAudio"><source src="/audio/Almost in F - Tranquillity - Kevin MacLeod.mp3" type="audio/mpeg"></audio>
    <audio id="dispertador"><source src="/audio/dispertador.mp3" type="audio/mpeg"></audio>
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-lg-block d-none">
                <img class="" src="/image/meditacaoAovivo.png" alt="">
            </div>
            <div class="col-12 col-lg-6" id="meditar">
                <h1 class="d-block d-lg-none style-h1">BORA MEDITAR!!<i class="fa-solid fa-peace ps-3   "></i></h1>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn-style" onclick="pauseMusic()"><i id="returnMusic1" class="fa-solid fa-music"></i><i id="returnMusic" style="display: none" class="fa-solid fa-radio"></i></button>
                    <button class="btn-style" onclick="pauseGuiada()"><i id="returnVoll1" class="fa-solid fa-volume-high"></i><i id="returnVoll" style="display: none" class="fa-solid fa-volume-xmark"></i></button>
                </div>
                <div class="box d-flex flex-column align-items-center">
                    <div class="box-circle">
                        <svg>
                            <circle cx="90" cy="90" r="90"></circle>
                            <circle id="circleProgress" cx="90" cy="90" r="90"></circle>
                        </svg>
                        <h2 id="timer" class="number">00:00</h2>
                    </div>
                    <div class="mt-3">
                        <button class="btn-style px-sm-4 me-sm-1" onclick="startTimer(5)">5m</button>
                        <button class="btn-style px-sm-4 me-sm-1" onclick="startTimer(10)">10m</button>
                        <button class="btn-style px-sm-4 me-sm-1" onclick="startTimer(20)">20m</button>
                        <button class="btn-style px-sm-4" onclick="startTimer(30)">30m</button>
                    </div>
                    <div class="mt-4">
                        <button class="btn-style" onclick="pauseTimer()" id="returnPause" style="display: none"><i class="fa-solid fa-pause"></i></button>
                        <button class="btn-style" onclick="returnTimer()" id="returnButton" style="display: none"><i class="fa-solid fa-play"></i></button>
                        <button class="btn-style" onclick="stopTimer()" id="returnStop" style="display: none"><i class="fa-solid fa-stop"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-sm-5 mt-xs-10 mb-5">
        <div class="row ">
            <div class="col col-sm-4 coluna-1">
                <h1 class="text-center mb-3 mt-5">14</h1>
                <h2 class="text-center mb-5">QUINTA-FEIRA</h2>
                <h5 class="ms-1">Total de meditação</h5>
                <p class="ms-3">20X</p>
                <div class="d-flex justify-content-between">
                    <h5 class="ms-1">Criar lembrete</h5>
                    <button><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="mt-3 mb-0 mb-lg-5 d-md-none d-lg-block borda px-5">

                </div>
                <h3 class="text-center fw-bold text-light d-sm-none">Dias Meditados</h3>
            </div>
            <div class="col col-sm-8 coluna-2">
                <h3 class="text-center mt-2">Dias Meditados</h3>
                <div class=" text-center borda-b">
                    <span class="">Jan</span>
                    <span class="">Feb</span>
                    <span class="">Mar</span>
                    <span class="">Abr</span>
                    <span class="">May</span>
                    <span class="">Jun</span>
                    <span class="">July</span>
                    <span class="">Aug</span>
                    <strong class="">Set</strong>
                    <span class="">Oct</span>
                    <span class="">Nov</span>
                    <span class="">Dec</span>
                    <div class="mb-3"></div>
                </div><!-- months -->
                <div class="d-flex justify-content-center align-content-center tableStyle pt-2">
                    <table class="text-center">
                        <tr class="fw-bold">
                          <th class="">Dom</th>
                          <th>Seg</th>
                          <th>Ter</th>
                          <th>Qua</th>
                          <th>Qui</th>
                          <th>Sex</th>
                          <th>Sab</th>
                        </tr>
                        <tr>
                          <td class="off-text">27</td>
                          <td class="off-text">28</td>
                          <td class="off-text">29</td>
                          <td class="off-text">30</td>
                          <td class="off-text" class="off-text">31</td>
                          <td>01</td>
                          <td>02</td>
                        </tr>
                        <tr>
                          <td>03</td>
                          <td>04</td>
                          <td>05</td>
                          <td>06</td>
                          <td>07</td>
                          <td>08</td>
                          <td>09</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>11</td>
                          <td>12</td>
                          <td>13</td>
                          <td class="active-dayy">14</td>
                          <td>15</td>
                          <td>16</td>
                        </tr>
                        <tr>
                          <td>17</td>
                          <td>18</td>
                          <td>19</td>
                          <td>20</td>
                          <td>21</td>
                          <td>22</td>
                          <td>23</td>
                        </tr>
                        <tr>
                          <td>24</td>
                          <td>25</td>
                          <td>26</td>
                          <td>27</td>
                          <td>28</td>
                          <td>29</td>
                          <td>30</td>
                        </tr>
                        <tr>
                          <td class="off-text">01</td>
                          <td class="off-text">02</td>
                          <td class="off-text">03</td>
                          <td class="off-text">04</td>
                          <td class="off-text">05</td>
                          <td class="off-text">06</td>
                          <td class="off-text">07</td>
                        </tr>
                    </table>                  
                </div>
            </div>

            <div class="col d-sm-none coluna-3">
                <h5 class="ms-1">Total de meditação</h5>
                <p class="ms-3">20X</p>
                <div class="d-flex justify-content-between">
                    <h5 class="ms-1">Criar lembrete</h5>
                    <button><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

        </div>
    </div>    



</body>
<script>
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
</script>
@endsection


