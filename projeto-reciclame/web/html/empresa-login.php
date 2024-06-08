
<?php
session_start();
$email = $_POST["email"];
$senhaLimpa = $_POST["senha"];
$senha = hash("sha256", $senhaLimpa);

$sql = "SELECT idEmpresa, email, senha FROM tb_empresas WHERE email = :user AND senha = :passwd";
        
/* SLQ modificado apra evitar logim com a ( 'or'a'='a ) garantindo mais segurança, tratando como parametros e não valores */

$conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
$resultado = $conexao->prepare($sql);
$resultado ->bindParam(':user', $email);
$resultado ->bindParam(':passwd', $senha);
$resultado ->execute();



$linha = $resultado->fetch();
$empresa_logado = $linha['email'];
$idEmpresa = null;
if ($empresa_logado == null) {
    // Usuário ou senha inválida
    header('Location: usuario-erro-logado-.php');
} else {
    $_SESSION['usuario_logado'] = $empresa_logado;
    echo "Empresa logada: " . $empresa_logado; // Adicione esta linha para depurar
    echo "ID da Empresa: " . $linha['idEmpresa']; // Adicione esta linha para depurar
    $_SESSION['usuario_logado'] = $empresa_logado;
    $_SESSION['idEmpresa'] = $linha['idEmpresa']; // Definindo idEmpresa na sessão
    header('Location: index-logado.php');
    exit(); // Importante encerrar a execução após redirecionamento

}


?>