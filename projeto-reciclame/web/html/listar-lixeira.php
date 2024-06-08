<?php
require_once 'usuario-verifica.php';
require_once "../classes/lixeira.php";
$lixeira = new Lixeira();
$lista = $lixeira->listar();


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
    <title>Lixeiras Cadastradas</title>
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
        <section class="table-sec container-fluid">
            <h1>Lixeiras Cadastradas</h1>


            <table class="table table-bordered ">
                <thead class="thead-dark">

                    <th scope="col">Código</th>
                    <th scope="col">propietario</th>
                    <th scope="col">Material</th>
                    <th scope="col">peso.Max</th>
                    <th scope="col">vol.Max</th>

                    <th scope="col">latitude</th>
                    <th scope="col">longitude</th>
                    <th scope="col">localizacao</th>
                    <th scope="col">ações</th>
                    </tr>
                    <?php foreach ($lista as $linha): ?>
                        <tr class="table-light">

                            <td>
                                <?php echo $linha['idLixeira'] ?>
                            </td>
                            <td>
                                <?php echo $linha['nome_empresa'] ?>
                            </td>
                            <td>
                                <?php echo $linha['tipo'] ?>
                            </td>
                            <td>
                                <?php echo $linha['peso'] ?>
                            </td>
                            <td>
                                <?php echo $linha['volume'] ?>
                            <td>
                                <?php echo $linha['latitude'] ?>
                            </td>
                            <td>
                                <?php echo $linha['longitude'] ?>
                            </td>
                            <td>
                                <?php echo $linha['nome'] ?>
                            </td>


                            <!-- ... (seu código existente) ... -->

                            <td class="act">
                                <a href="form-atualizar-lixeira.php?id=<?php echo $linha['idLixeira']; ?>">Atualizar</a>
                                <a href="excluir-lixeira.php?id=<?php echo $linha['idLixeira']; ?>">Excluir</a>
                            </td>

                            <!-- ... (seu código existente) ... -->


                        </tr>
                    <?php endforeach ?>
            </table>
        </section>
    </main>
</body>

</html>