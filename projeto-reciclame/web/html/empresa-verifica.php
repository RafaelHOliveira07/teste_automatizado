<?php

session_start();

// Verifica se a variável de sessão 'usuario_logado' existe e está definida
if (!isset($_SESSION['usuario_logado'])) {
    // Usuário não logado, redireciona para a página de login
    header('Location: usuario-nao-logado-.php');
    exit(); // Certifique-se de sair após o redirecionamento
} else {
    // Se 'usuario_logado' existe, verifica se 'idEmpresa' também está definido
    if (isset($_SESSION['idEmpresa'])) {
        $idEmpresa = $_SESSION['idEmpresa'];

        // Verifica se 'nome' está definido na sessão
        if (isset($_SESSION['nome'])) {
            $nomeEmpresa = $_SESSION['nome'];
            
// ... (seu código existente) ...
include_once '../classes/empresa.php';
// Crie uma instância da classe Empresa
$empresa = new Empresa();

// Obtém o ID da empresa da sessão
$idEmpresa = $_SESSION['idEmpresa'];

// Obtém o nome da empresa chamando a função da classe Empresa
$nomeEmpresa = $empresa->obterNomeEmpresaDaSessao();

// Define a variável de sessão com o nome da empresa
$_SESSION['nomeEmpresa'] = $nomeEmpresa;


        } else {
            // 'nome' não está definido na sessão, trata esse caso conforme necessário
            $nomeEmpresa = "Nome não disponível";
        }
    } else {
        // 'idEmpresa' não está definido na sessão, trata esse caso conforme necessário
        echo "Erro: ID da empresa não disponível na sessão.";
        exit(); // Certifique-se de sair após o tratamento do erro
    }
}
?>
