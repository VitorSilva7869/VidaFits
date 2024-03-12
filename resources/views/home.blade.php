    @extends('layout.main')

    @section('css')
        <link rel="stylesheet" href="/css/home.css">
    @endsection
    
    
@section('conteudo')
    <section class="container mt-5">
        <div class="row d-flex align-items-center mb-5">
            <div class="col-md-6 coluna1-1 text-center text-md-start">
                <h1>Encontre paz interior e equilíbrio com a meditação. Descubra um caminho de bem-estar na<span>Amigos</span></h1>
            </div>
            <div class="col-6 d-md-block d-none btn-home">
                <img src="/image/meditação.png" alt="Menina meditando" class="img-fluid" style="width: 400px;">
                <a href="/meditar" class="">Começar <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="row d-flex align-items-center propiedade margin-t aparecer">
            <div class="col-12 col-sm-6  col-md-6 text-center text-md-start">
                <img src="/image/meditação4.png" alt="Menina meditando" class="img-fluid" style="width: 400px;">
            </div>
            <div class="col-12 col-sm-6 col-md-6 text-center text-sm-start">
                <h2>Descubra o poder da meditação</h2>
                <h4>Além de ajudar a acalmar a mente, a prática regular da meditação melhora a concentração e a capacidade de tomar decisões. Aumente sua produtividade e encontre clareza mental através dessa poderosa técnica.</h4>
            </div>
        </div>
        <div class="row d-flex align-items-center propiedade aparecer">
            <div class="col-12 col-sm-12 col-md-6 text-center text-md-start">
                <h2>O segredo da felicidade está na meditação</h2>
                <h4>Estudos mostram que a meditação reduz o estresse e a ansiedade, promovendo uma sensação de bem-estar e felicidade. Experimente essa prática simples e transformadora e descubra como ela pode melhorar sua qualidade de vida</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <img src="/image/feliz.png" alt="Menina meditando" class="img-fluid" >
            </div>
        </div>
        <div class="row d-flex align-items-center propiedade aparecer">
            <div class="col-12 col-sm-12 col-md-6">
                <img src="/image/correr.png" alt="Menina meditando" class="img-fluid">
            </div>
            <div class="col-12 col-sm-12 col-md-6 text-center text-md-start">
                <h2>Dê um 'pause' na vida agitada</h2>
                <h4>A meditação é um momento em que você pode se desconectar do mundo exterior e se reconectar consigo mesmo. Encontre paz interior, reduza o estresse do dia a dia e encontre equilíbrio emocional com essa prática calmante e revitalizante.</h4>
            </div>
        </div>
        <div class="btn-final">
            <a href="/meditar" class="">Avançar <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </section>

<script>
   
    const observer = new IntersectionObserver(entries =>{
    console.log(entries)

    Array.from(entries).forEach(entry =>{
        if (entry.intersectionRatio >= 1){
            entry.target.classList.add('apareceroff'); // Remova o ponto antes de 'apareceroff'
        }
    })
   },{
    threshold: [0, .5, 1]
   }) 

   Array.from(document.querySelectorAll('.aparecer')).forEach(element => {

       observer.observe(element)
   })

</script>
@endsection
