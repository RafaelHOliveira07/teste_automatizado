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
require_once '../javascript/web.php';


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../style/style-log.css">
    <link rel="stylesheet" href="../style/style-charts.css">
    <link href="../style/stylemap.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../style/style-painel.css">

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
    <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");
    </script>
    <iframe src="http://127.0.0.1:1880/ui/#!/0?socketid=n6TjMogNll7Hy90rAAAF"> </iframe>



    </section>

   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk&callback=initMap"
        async defer></script>
        <script>
  function toggleNotifications() {
    var notificationsList = document.getElementById('notificationsList');
    var statusMenu = document.getElementById('statusMenu');
    
    if (notificationsList.style.display === 'none' || notificationsList.style.display === '') {
      notificationsList.style.display = 'block';
      statusMenu.style.display = 'none';
    } else {
      notificationsList.style.display = 'none';
    }
  }

  function toggleStatusMenu() {
    var notificationsList = document.getElementById('notificationsList');
    var statusMenu = document.getElementById('statusMenu');
    
    if (statusMenu.style.display === 'none' || statusMenu.style.display === '') {
      statusMenu.style.display = 'block';
      notificationsList.style.display = 'none';
    } else {
      statusMenu.style.display = 'none';
    }
  }
</script>



 
  

</body>

</html>