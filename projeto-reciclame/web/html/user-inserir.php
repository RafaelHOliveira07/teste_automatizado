<?php

try {
    $usuario = $_POST["usuario"];


    //gera um bash SHA-256 da senha recebido pelo formulário
    $senha = hash("sha256", $_POST["senha"]);

    //cria uma nova instancia da classe DateTime
    //e obtem a data atual no formulário "dia-mês-ano"


    $sql = "INSERT INTO tb_adm (usuario, senha)
            VALUES ('{$usuario}','{$senha}')";

    include_once "../classes/conexao.php";
    $conexao->exec($sql);
    echo "<h3>Registro gravado com suscesso</h3>";
    echo "<a href='usuario-login.php'>Fazer login</a>";

} catch (Exception $erro) {
    //habilitar o codigo abaixo para depurar o erro
    //echo $erro->getMessage();
    echo "Ocorreu um erro. Por favor, tente novamente mais tarde.";
}