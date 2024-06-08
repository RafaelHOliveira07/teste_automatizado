<?php
session_start();

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Exclui o cookie da sessão (se estiver sendo usado)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destrói a sessão
session_destroy();

// Redireciona para a página de login ou para qualquer outra página desejada após o logout
header('Location: form-login-adm.php');
exit();
?>