<?php
session_start();




if (!isset($_SESSION['usuario_logado'])) {
    // Usuário não está logado, redireciona para a página apropriada
    header('Location: adm-nao-logado.php');
    exit();
} else {
    // O usuário está logado, permita o acesso à página
    // Você pode adicionar mais lógica aqui, se necessário
}
?>