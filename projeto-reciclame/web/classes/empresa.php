<?php

class Empresa{

    public $idEmpresa;
    public $nome;
    public $cnpj;
    public $email;
    public $senha;
    public $cidade;
    public $estado;
    public $endereco;
    public $numero;
    public $tel;
    public $cep;
    



public function __construct($idEmpresa = false)
{
    if($idEmpresa){
        $this->idEmpresa = $idEmpresa;
        $this->carregar();
    }
}

public function listar(){
    $sql = "SELECT * FROM tb_empresas";
    include_once "conexao.php";
    $resultado = $conexao->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}
public function carregar(){

            // Query SQL para buscar uma turma no banco de dados pelo id
            $sql = "SELECT * FROM tb_empresas WHERE idEmpresa=" . $this->idEmpresa;
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');

            // Execução da query e armazenamento do resultado em uma variável
            $resultado = $conexao->query($sql);
            // Recuperação da primeira linha do resultado como um array associativo
            $linha = $resultado->fetch();

            // Atribuição dos valores dos campos da turma recuperados do banco às propriedades do objeto
            $this->nome = $linha['nome'];
            $this->cnpj = $linha ['cnpj'];
            $this->email = $linha ['email'];
            $this->senha = $linha ['senha'];
            $this->cidade = $linha ['cidade'];
            $this->estado = $linha ['estado'];
            $this->endereco = $linha ['endereco'];
            $this->cnpj = $linha ['cnpj'];
            $this->numero = $linha ['numero'];
            $this->tel = $linha ['tel'];
            $this->cep = $linha ['cep'];

        }
     
        public function obterNomeEmpresaDaSessao()
        {
            // Verifica se a sessão está iniciada e se a variável de nome está definida
            if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['nome'])) {
                return $_SESSION['nome'];
            } else {
                return null; // Ou qualquer valor padrão que você preferir
            }
        }

// Exemplo de uso



        function excluir() {
            if ($this->idLixeira) {
                // Query SQL para excluir a lixeira com base no ID
                $sql = "DELETE FROM tb_lixeiras WHERE idLixeira = :idLixeira";
                
                // Conexão com o banco de dados
                $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
        
                // Preparação da query
                $stmt = $conexao->prepare($sql);
        
                // Bind do parâmetro
                $stmt->bindParam(':idLixeira', $this->idLixeira, PDO::PARAM_INT);
        
                // Execução da query
                $stmt->execute();
        
                // Verifique se a lixeira foi excluída com sucesso
                if ($stmt->rowCount() > 0) {
                    // Lixeira excluída com sucesso
                    return true;
                } else {
                    // Falha ao excluir a lixeira
                    return false;
                }
            } else {
                // ID da lixeira não definido
                return false;
            }
        }
        
        public function obterPontoEmpresaParaMapa() {
            // Verifique se o ID da empresa está definido na sessão
            if (isset($_SESSION['idEmpresa'])) {
                // Obtém o ID da empresa da sessão
                $idEmpresa = $_SESSION['idEmpresa'];
        
                // Consulta SQL ajustada para obter os pontos apenas para a empresa específica
                $sql = "SELECT latitude, longitude, nome FROM tb_empresas WHERE idEmpresa = $idEmpresa";
        
                $conexao = new PDO('mysql:host=127.0.0.1;dbname=reciclame', 'root', '');
                $resultado = $conexao->query($sql);
        
                $ponto = [];
        
                foreach ($resultado as $linha) {
                    $ponto = [
                        'latitude' => $linha['latitude'],
                        'longitude' => $linha['longitude'],
                        'nome' => $linha['nome'],
                    ];
                }
        
                return $ponto;
            } else {
                // Se o ID da empresa não estiver definido na sessão, retorne algo adequado (você decide)
                return null;
            }
        }
        
        
        
        
        
}




