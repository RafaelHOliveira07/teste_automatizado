<?php

require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];


require_once '../classes/lixeira.php';
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
  <!-- Latest compiled and minified CSS -->

  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
<link href="../style/stylemap.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
 
  <link rel="stylesheet" href="../style/style-painel.css"> 

    
    <link rel="stylesheet" href="../style/style-log.css"> 
    <link rel="stylesheet" href="../style/newponto.css"> 
  <title>Pontos de Coleta</title>
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
  <main class=" cadas-cont">

    <section class="info-cadas">
      <h4>Pontos de coleta persolizado:</h4>
      <p>Aqui voce escolhe o local onde serao seus pontos de coleta, basta adicionar o endereço e selecionar as opções
        de tamanho que temos disponiveis(peso,volume e tipo).


      </p>
      <p>OBS:No caso do endeço ser privado, sera necessario autorização do proprietario para que possa ser realizada a
        instalacao de um novo ponto de coleta:</p>

      <h5>Exemplo:</h5>
      <p>Desejo instalar meu ponto em certo supermercado, então serei responsalvel por consguir a autorização do
        estabelecimento para a coleta.</p>
      <form action="gravar-lixeira.php" method="POST">


        <input type="hidden" name="idEmpresa" value="<?php echo $idEmpresa; ?>">

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="tipo">Tipo material</label>
            <select name="tipo" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="Plastico">Plastico</option>
              <option value="Papel">Papel</option>
              <option value="Vidro">Vidro</option>
              <option value="Metal">Metal</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="localizacao">Localização</label>
            <input type="text" class="form-control" name="localizacao" placeholder=" Rua , Bairro , Cidade, País"
              required>

          </div>

        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="peso">Peso.Max</label>
            <select name="peso" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="50">50 Kilos</option>
              <option value="60">60 Kilos</option>
              <option value="80">80 Kilos</option>
              <option value="100">100 Kilos</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="volume">Volume.Max</label>
            <select name="volume" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="50">50 Litros</option>
              <option value="100">100 Litros</option>
              <option value="200">200 Litros</option>
              <option value="400">400 Litros</option>
            </select>
          </div>
        </div>

        <button type="submit">Gravar</button>
      </form>
    </section>


  </main>
  <footer>
    <h3>Redes Sociais</h3>
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
  <script>
    var socket = new WebSocket("ws://localhost:1880/reciclame.com/ws");
  </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>