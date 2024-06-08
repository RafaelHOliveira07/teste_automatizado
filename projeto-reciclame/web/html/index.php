<?php




require_once '../classes/lixeira.php';
$lixeira = new Lixeira();




$jsonPontosLixeira = $lixeira->obterPontosParaMapa();
require_once 'maps.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Carregue a API do Google Maps com um retorno de chamada -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap"
    async defer></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="../style/style.css">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


  <title>Projeto-reciclame</title>
</head>

<body>
  <header>
    <div class="h1-logo">
      <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
    </div>

    <nav class="navbar navbar-expand-lg main-nav px-0">




      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu"
        aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="burg" id="d1"></span>
        <span class="burg" id="d2"></span>
        <span class="burg" id="d3"></span>

      </button>
      <div class="collapse navbar-collapse" id="mainMenu">

        <ul class="navbar-nav ml-auto text-uppercase f1">
          <li>
            <a href="#home">Início</a>
          </li>
          <li>
            <a href="index.php#sec-01">Sobre</a>
          </li>

          <li>
            <a href="empresa-form.php">Entrar</a>
          </li>
          <li>
            <a href="cadastro-empresa.php">Cadastrar-se</a>
          </li>

        </ul>

      </div>

  </header>
  <div class="dark-fade"></div>

  <div class="car-text" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
    data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" data-aos-anchor-placement="top-center">
    
    <h1 class="fancy">Seja-bem vindo</h1>
    <p class="fancy-p">AO PROJETO RECICLA-ME ONDE RECICLAR TEM TUDO A VER COM TECNOLOGIA</p>
  
  </div>
  <div id="carouselExampleControls" class="img-fundo carousel slide" data-ride="carousel">

    <div class="carousel-inner">


      <div class="carousel-item active">
        <img class="d-block w-100" src="../img/post-id-dia-internacional-da-reciclagem-secretaria-municip.jpg" alt="Primeiro Slide">
      </div>
    </div>

  </div>



  <main class=" container-fluid">


    <section class="sec-01 container-fluid">


      <div class="text flex-column" data-aos="fade-down" data-aos-offset="100" data-aos-delay="50"
        data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true">
        <h2 id="sec-01">Conheça nosso projeto</h2>


      </div>



      <div class="img-sec container-fluid" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50"
        data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true">
        <label for="agi">
          <img class="img-fluid" src="../img/iteracao.png" alt="agilidade" id="agi"> <span>Mais agilidade na
            coleta</span></label>
        <div class="p">
          <p>Nosso projeto visa, auxiliar a coleta seletiva de Empresas Públicas e Empresas Privadas, oferecendo dados que
            poderão ser utilizados para saber a quantidade de recicláveis gerado, a localização do Ponto de Coleta Inteligente e notificações para efetuar a coleta.
          </p>
        </div>
      </div>

      <div class="img-sec container-fluid" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50"
        data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true">
        <label for="eco">
          <img class="img-fluid" src="../img/eco.png" alt="eco" id="eco"><span>Aliado da natureza</span></label>
        <div class="p">
          <p>Para isso foram desenvolvidas "lixeiras inteligente" Pontos de Coleta Inteligente, voltadas para lixo reciclável, ou seja, o intuito e
            gerar menos desperdício e selecionar corretamente o que é reciclável, ajudando tanto a cidade, as empresas,
             grupos de coleta e também o cidadão.</p>
        </div>

      </div>

      <div class="img-sec container-fluid" data-aos="fade-right" data-aos-offset="200" data-aos-delay="50"
        data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true">
        <label for="tecb">
          <img class="img-fluid" src="../img/tecnologia.png" alt="tec" id="tec"><span>Portal Web com
            dashbord</span></label>
        <div class="p">
          <p>Nossos Pontos de Coleta Inteligente serão equipadas com sensores que enviam informações a um Banco de Dados na Nuvem, informações como,
            quantidade de lixo que foi armazenada, data da coleta, entre muitas outras. Nosso principal
            foco é um Painel com Dashboard com informações de cada Ponto de Coleta Inteligente assim como sua localização.</p>
        </div>
      </div>



    </section>
    <section class="sec-02 container-fluid" data-aos="fade-down" data-aos-offset="100" data-aos-delay="50"
      data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true">
      <h2 class="dysplay-4">Encontre a lixeira mais próxima de você:</h2>


      <div class="img-maps">

        <div id="mapa"></div>


        <div class="text-leg">


         
            <p>Legenda</p>
       <p>Cada cor representa um tipo de lixo em nossos ícones siga a legenda a baixo se necessário</p>

            <div class="leg"> 
             <label for="">Vidro
             <span class="cube" id="green"></span></label>
             <label for="">Papel
             <span class="cube" id="blue"></span></label>
             <label for="">Metal
             <span class="cube" id="yellow"></span></label>
             <label for="">Plastico
             <span class="cube" id="red"></span></label>
           </div>
           <p>Basta clicar em permitir sua localização e pronto, nosso mapa ira te indicar as lixeiras mais
            próximas da sua localização atual</p>
        </div>

    </section>



    <section class="sec-03 ">
<h2 class="parca">torne-se um parceiro</h2>


  <div class="work-sec">
 
    
<div class="flex-coluna">
  
         
       
       
        <aside class="text-cad">
         
          <p data-aos="fade-right" data-aos-offset="200" data-aos-delay="100" data-aos-duration="1000"
            data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true"> Agilize sua maneira de lidar com seu lixo.</p>
            <button class="bt-cadas">
              <span><a href="cadastro-empresa.php">Clique aqui
              <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="37" cy="37" r="35.5" stroke="black" stroke-width="3"></circle>
                  <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
              </svg></a></span>
          </button>
       <div>          
 <p class="min-p">Cadastro é voltado para
            empresas(Publicas ou privadas) que desejam utilizar 
           nosos PCI(Pontos de Coleta Inteligente), acesse pelo link logo acima e conheça as opcões para que voce lide com seu lixo de maneira mais Inteligente.</p>
          </div>
  
      </div>
   </aside>         

  <div id="work" data-aos="fade-left" data-aos-offset="200" data-aos-delay="1000" data-aos-duration="20000"
          data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true" style="margin: auto; padding: 2rem;">
<img src="../img/lixito.png" alt="">
       

        </div>
 
</div>


    </section>


  </main>

  <footer>
    <h3>Redes-Sociais</h3>
    <div class="redes">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-youtube"></a>

    </div>

  </footer>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>


</body>

</html>
