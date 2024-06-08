

<?php
require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];
include_once '../classes/empresa.php';
$empresa = new Empresa();


$pontos_empresa = $empresa->obterPontoEmpresaParaMapa();
$pontos_json_empresa = json_encode($pontos_empresa);


require_once '../classes/lixeira.php';
$lixeira = new Lixeira();
$jsonPontosLixeira = $lixeira->obterPontosLixeiraParaMapa();
require_once 'maps-empresa.php';

$lixeira = new Lixeira();
$lista = $lixeira->listarlogado($idEmpresa);

$listaJson = json_encode($lista);
require_once '../javascript/web.php'


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
 
    <!-- Carregue a API do Google Maps com um retorno de chamada -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap" async defer></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
  <link href="../style/stylemap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="../style/style-charts.css">
    <link href="../style/stylemap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../style/style-painel.css">
    <link rel="stylesheet" href="../style/style-log.css">

  <title>Projeto-Reciclame</title>
</head>

<body>
  
<header>
        <div class="h1-logo">
            <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
        </div>


            <nav>
                    
                    <ul>
                
                    <li>
                        <a href="index-logado.php"><span class="material-symbols-outlined">
                        home
                        </span>Inicio</a>
                    </li>
                    <li>
                        <a href="painel2.php"><span class="material-symbols-outlined">
                        delete
                        </span> Meus Pontos de Coleta</a>
                    </li>
                    <li>
                        <a href="cadastro-lixeira.php">
                        <span class="material-symbols-outlined">
                            library_add
                            </span>
                        </span>Novo Ponto de Coleta</a>
                    </li>
                
                    </ul>

            </nav>

        <div class="exit-link">
            <a href="empresa-logout.php" class="">Sair<span class="material-symbols-outlined">
                    logout
                </span></a>
        </div>
    </header>

    <section class="meio">
        <div class="car-text-login">
        <button id="toggleNotificationsButton" class="button-not" onclick="toggleNotifications()">
        <span id="sino" class="material-symbols-outlined">notifications</span>
        <span id="notificationCount" class="notification-count">0</span>
    </button>
    <ul id="notificationsList" class="not-list" style="display: none;"></ul>



<button id="toggleStatusButton" class="button-status" onclick="toggleStatusMenu()">Status das Lixeiras</button>
    <div id="statusMenu" style="display: none;">
    <ul id="statusList" class="sta-list">

</ul>

    <!-- Os itens da lista de status serão adicionados aqui dinamicamente -->
</ul>

    </div>


   
            <?php
    if (!empty($lista)) {
    // Obtém o nome da empresa da primeira linha (assumindo que o nome é o mesmo para todas as lixeiras)
    $nomeDaEmpresa = $lista[0]['nome_empresa'];

    // Loop foreach para exibir as lixeiras
 
    $nomeDaEmpresaExibido = false;
    
    foreach ($lista as $linha) {
        if (!$nomeDaEmpresaExibido) {
            echo "<h3 class='fancy-p'>$nomeDaEmpresa</h3>";
            $nomeDaEmpresaExibido = true;
        }
    
        // Aqui você também pode exibir outras informações da lixeira, se necessário
    }
    
} else {
    echo "NOME NÃO DISPONÍVEL!";
}
?> <h1 class="fancy">Meus Pontos de Coleta</h1>
        </div>
        

    </section>     

    
<main>
  <div class="cards">
  <div class="card-container">
  <div class="card cyan">
    <h2 class="card_title">Painel/Meus Pontos de Coleta</h2>
    <p class="card_content">Vizualize seus pontos de Coleta cadastrados.Acompanhe em tempo real e seja notificado quando ponto estiver pronto para coleta</p>
    <img class="card_img" src="https://raw.githubusercontent.com/davidsonaguiar/frontendmentor/main/Four%20card%20feature%20section/images/icon-supervisor.svg" alt="Supervisor">
  </div>

  <div class="card red">
    <h2 class="card_title">Requisitar novo Ponto de coleta</h2>
    <p class="card_content">Requisite um novo ponto de coleta rapidamente de acordo com sua necessidade, basta selecionar a opção no nosso menu</p>
    <img class="card_img" src="https://raw.githubusercontent.com/davidsonaguiar/frontendmentor/main/Four%20card%20feature%20section/images/icon-team-builder.svg" alt="page-home">
  </div>
</div>
<div class="card-container">
  <div class="card blue">
    <h2 class="card_title">Perfil</h2>
    <p class="card-content">Vizualize e altere se necessario ,aqui as informações sobre sua empresas, relacionadas ao seu cadastro.</p>
    <img class="card_img" src="https://raw.githubusercontent.com/davidsonaguiar/frontendmentor/main/Four%20card%20feature%20section/images/icon-karma.svg" alt="Karma">
  </div>

  <div class="card orange">
    <h2 class="card_title">Encerrar seção</h2>
    <p class="card_content">Para sair da seção atual de login, basta selecionar a opção localizada na parta inferior do nosso menu</p>
    <img class="card_img" src="https://raw.githubusercontent.com/davidsonaguiar/frontendmentor/main/Four%20card%20feature%20section/images/icon-calculator.svg" alt="Calculator">
  </div>
</div>


</div>




  


    
  </main>





  <script src="../javascript/xhr.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");
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