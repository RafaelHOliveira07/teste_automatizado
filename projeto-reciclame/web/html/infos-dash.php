<?php
require_once 'empresa-verifica.php';
$idEmpresa = $_SESSION['idEmpresa'];
require_once '../classes/lixeira.php';
$lixeira = new Lixeira();
include_once '../classes/empresa.php';
$empresa = new Empresa();
$lista = $lixeira->listar();

$listaJson = json_encode($lista);

// Verifique se a lista JSON foi gerada com sucesso
if ($listaJson !== false) {
    // Verifique se o ID da lixeira foi enviado via POST
    if (isset($_POST['idPontoColeta'])) {
        // Obtenha o ID da lixeira selecionada
        $idPontoColeta = $_POST['idPontoColeta'];

        // Procurar a lixeira com base no ID
        $lixeiraSelecionada = null;
        foreach ($lista as $lixeira) {
            if ($lixeira['idLixeira'] == $idPontoColeta) {
                $lixeiraSelecionada = $lixeira;
                break;
            }
        }

        // Exiba as informações da lixeira selecionada
        if (!empty($lixeiraSelecionada)) {
            echo '<ul>';
            echo '<li><h4>Informações</h4></li>';
            echo '<li><span>Tipo: ' . $lixeiraSelecionada['tipo'] . '</span></li>';
            echo '<li><span>Local/Localização: ' . $lixeiraSelecionada['nome'] . '</span></li>';
            echo '<li><span>Vol MAX: ' . $lixeiraSelecionada['volume'] . '</span></li>';
            echo '<li><span>Pes MAX: ' . $lixeiraSelecionada['peso'] . '</span></li>';
            echo '</ul>';
        } else {
            echo 'Nenhuma informação encontrada para esta lixeira.';
        }
    } else {
        echo 'ID da lixeira não enviado.';
    }
} else {
    // Se houver erro na geração do JSON, exiba uma mensagem de erro
    echo 'Erro ao converter lista em JSON.';
}
?>
