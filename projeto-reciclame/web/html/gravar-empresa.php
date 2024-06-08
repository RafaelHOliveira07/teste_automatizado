<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecte-se ao seu banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reciclame";

    // Crie uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupere os dados do formulário e limpe-os
    $nome = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tel = $_POST["tel"];
    $enderecoCompleto = $_POST["endereco"] . ", " . $_POST["numero"] . ", " . $_POST["cidade"] . ", " . $_POST["estado"] . ", " . $_POST["cep"];

    $senha = hash('sha256', $senha);
    // Sua chave de API do Google Maps
    $chaveAPI = 'AIzaSyCnw1VEDXoPg6E4-Fk3SUkIPpOcIx5Y-nk';

    // Prepara o endereço para a URL
    $enderecoFormatado = urlencode($enderecoCompleto);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$enderecoFormatado}&key={$chaveAPI}";
    $resposta = file_get_contents($url);
    $dados = json_decode($resposta);

    // Verifica se a resposta da API é bem-sucedida
    if ($dados->status === 'OK') {
        // Obtém as coordenadas de latitude e longitude
        $latitude = $dados->results[0]->geometry->location->lat;
        $longitude = $dados->results[0]->geometry->location->lng;
        $localizacao = $dados->results[0]->formatted_address;

        // Monta a consulta SQL com os dados obtidos
        $query = "INSERT INTO tb_empresas (nome, cnpj, email, senha, tel, latitude, longitude, localizacao) VALUES ('$nome', '$cnpj', '$email', '$senha', '$tel', '$latitude', '$longitude', '$localizacao')";

        // Executa a consulta
        if ($conn->query($query) === TRUE) {
            $mensagemCadastro = "Empresa cadastrada com sucesso!";
    // Redirecione para a página desejada após o cadastro

            header('Location: index.php');
            if (isset($mensagemCadastro)) {
                ?>
                <script>
                    alert("<?php echo $mensagemCadastro; ?>");
                </script>
                <?php
              }
        } else {
            echo "Erro ao cadastrar a empresa: " . $conn->error;
        }
    } else {
        echo "Erro ao obter coordenadas do endereço fornecido.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>