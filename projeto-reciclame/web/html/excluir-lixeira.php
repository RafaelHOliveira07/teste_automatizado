<?php

// Certifique-se de que o ID da lixeira está definido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idLixeira'])) {
    $idLixeira = $_POST['idLixeira'];

    
     $lixeira = new Lixeira($idLixeira);
    if ($lixeira->excluir()) {
         echo "Lixeira excluída com sucesso.";
     } else {
        echo "Falha ao excluir a lixeira.";
    }

    // Lembre-se de redirecionar para a página desejada após a exclusão
   
    exit();
}

// Certifique-se de que o ID da lixeira está definido

