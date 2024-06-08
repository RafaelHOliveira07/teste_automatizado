<?php
require_once 'usuario-verifica.php';
require_once "../classes/empresa.php";
$empresa = new Empresa();
$lista = $empresa->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style-empresa-adm.css">
    <title>Empresas Cadastradas</title>
    <link rel="shortcut icon" href="../img/bin-verde.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="img-adm-headar">
            <img src="../img/Free_Sample_By_Wix__3_-removebg-preview.png" alt="">
            <h3>Area Administrativa </h3>
        </div>


        <nav><a href="adm-index.php">Inicio</a>
            <a href="listar-empresa.php">Empresas</a>
            <a href="listar-lixeira.php">Lixeira</a>
            <a href="usuario-logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <section class="table-sec">
            <h1>Empresas Cadastradas</h1>


            <table class="table table-bordered ">
                <thead class="thead-dark">

                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">cnpj</th>
                    <th scope="col">email</th>
                    <th scope="col">localizacao</th>
                    <th scope="col">tel</th>
                    <th scope="col">ações</th>
                    </tr>
                    <?php foreach ($lista as $linha): ?>
                        <tr class="table-light">

                            <td>
                                <?php echo $linha['idEmpresa'] ?>
                            </td>
                            <td>
                                <?php echo $linha['nome'] ?>
                            </td>
                            <td>
                                <?php echo $linha['cnpj'] ?>
                            </td>
                            <td>
                                <?php echo $linha['email'] ?>
                            <td>
                                <?php echo $linha['localizacao'] ?>
                            </td>
                            <td>
                                <?php echo $linha['tel'] ?>
                            </td>

                            <td class="act">
                                <a href="#">Atualizar</a>
                                <a href="#">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </table>
        </section>
    </main>
</body>

</html>