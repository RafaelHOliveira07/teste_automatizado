<?php




class Lixeira
{
    public $idLixeira;
    public $idEmpresa;
    public $tipo;
    public $peso;
    public $volume;
    public $latitude;
    public $longitude;
    public $nome;



    public function __construct($idLixeira = false)
    {
        if ($idLixeira) {
            $this->idLixeira = $idLixeira;
            $this->carregar();
        }
    }

    public function listar()
    {
        $sql = "SELECT tb_lixeiras.*, tb_empresas.nome AS nome_empresa 
                FROM tb_lixeiras 
                JOIN tb_empresas ON tb_lixeiras.idEmpresa = tb_empresas.idEmpresa";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarlogado($idEmpresa)
    {
        require_once 'empresa-verifica.php';
        $idEmpresa = $_SESSION['idEmpresa'];
        try {
            // Sua consulta SQL ajustada com uma consulta preparada
            $sql = "SELECT tb_lixeiras.*, tb_empresas.nome AS nome_empresa 
                FROM tb_lixeiras 
                JOIN tb_empresas ON tb_lixeiras.idEmpresa = tb_empresas.idEmpresa 
                WHERE tb_lixeiras.idEmpresa = :idEmpresa";

            // Cria uma conexão com o banco de dados
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

            // Prepara a consulta SQL
            $stmt = $conexao->prepare($sql);

            // Substitui o marcador de posição :idEmpresa pelo valor real
            $stmt->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);

            // Executa a consulta
            $stmt->execute();

            // Obtém os resultados
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retorna a lista
            return $lista;
        } catch (PDOException $e) {
            // Trate qualquer exceção do PDO aqui
            echo "Erro: " . $e->getMessage();
        }
    }
    public function carregar()
    {
        $sql = "SELECT * FROM tb_lixeiras WHERE idLixeira=" . $this->idLixeira;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->tipo = $linha['tipo'];
        $this->peso = $linha['peso'];
        $this->volume = $linha['volume'];
        $this->latitude = $linha['latitude'];
        $this->longitude = $linha['longitude'];
        $this->nome = $linha['nome'];

    }

    public function obterPontosParaMapa()
    {
        $sql = "SELECT * FROM tb_lixeiras";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
        $resultado = $conexao->query($sql);
        $pontos = [];

        foreach ($resultado as $linha) {
            $ponto = [
                'latitude' => $linha['latitude'],
                'longitude' => $linha['longitude'],
                'tipo' => $linha['tipo'],
                'peso' => $linha['peso'],
                'volume' => $linha['volume'],
                'nome' => $linha['nome']
            ];
            $pontos[] = $ponto;
        }

        // Adicione a cor associada a cada tipo de lixeira
        $coresPorTipo = [
            'Plastico' => 'vermelho',
            'Papel' => 'azul',
            'Vidro' => 'verde',
            'Metal' => 'amarelo',
            // Adicione mais tipos e cores conforme necessário
        ];

        $pontosLixeiraComCores = [];

        foreach ($pontos as $ponto) {
            $tipo = $ponto['tipo'];
            $cor = isset($coresPorTipo[$tipo]) ? $coresPorTipo[$tipo] : 'padrao';

            $pontosLixeiraComCores[] = [
                'latitude' => $ponto['latitude'],
                'longitude' => $ponto['longitude'],
                'tipo' => $ponto['tipo'],
                'peso' => $ponto['peso'],
                'volume' => $ponto['volume'],
                'nome' => $ponto['nome'],
                'cor' => $cor,
            ];
        }

        $pontosLixeira_json = json_encode($pontosLixeiraComCores);

        // Você pode retornar ou imprimir o JSON aqui, dependendo do seu uso
        return $pontosLixeira_json;
   
    }



    public function obterPontosLixeiraParaMapa()
    {
        if (isset($_SESSION['idEmpresa'])) {
            $idEmpresa = $_SESSION['idEmpresa'];
            $sql = "SELECT * FROM tb_lixeiras WHERE idEmpresa = $idEmpresa";
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
            $resultado = $conexao->query($sql);
            $pontos = [];

            foreach ($resultado as $linha) {
                $ponto = [
                    'latitude' => $linha['latitude'],
                    'longitude' => $linha['longitude'],
                    'tipo' => $linha['tipo'],
                    'peso' => $linha['peso'],
                    'volume' => $linha['volume'],
                    'nome' => $linha['nome']
                ];
                $pontos[] = $ponto;
            }

            // Adicione a cor associada a cada tipo de lixeira
            $coresPorTipo = [
                'Plastico' => 'vermelho',
                'Papel' => 'azul',
                'Vidro' => 'verde',
                'Metal' => 'amarelo',
                // Adicione mais tipos e cores conforme necessário
            ];

            $pontosLixeiraComCores = [];

            foreach ($pontos as $ponto) {
                $tipo = $ponto['tipo'];
                $cor = isset($coresPorTipo[$tipo]) ? $coresPorTipo[$tipo] : 'padrao';

                $pontosLixeiraComCores[] = [
                    'latitude' => $ponto['latitude'],
                    'longitude' => $ponto['longitude'],
                    'tipo' => $ponto['tipo'],
                    'peso' => $ponto['peso'],
                    'volume' => $ponto['volume'],
                    'nome' => $ponto['nome'],
                    'cor' => $cor,
                ];
            }

            $pontosLixeira_json = json_encode($pontosLixeiraComCores);

            // Você pode retornar ou imprimir o JSON aqui, dependendo do seu uso
            return $pontosLixeira_json;
        } else {
            // Retorna null ou faz algo conforme necessário
            return null;
        }
    }

    // Função para verificar se a lixeira está cheia (substitua pela sua lógica)


}