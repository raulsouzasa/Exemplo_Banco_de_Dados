<?php
    //Criação da classe "Conexão", que ira se conectar com o banco de dados
    class Conexao {
        
        //Definindo os atributos da classe
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "exemplo_aula_pw";
        private $conexao;

        //Criação do método construtor, que ira conter o processo de conexão com o banco de dados
        public function __construct() {

            //"conexao" ira conter o método que ira abrir uma conexão com o banco de dados
            //Tal metodo usara os outros atributos como parametros
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

            //Verificando se ocorreu um erro durante a conexão
            if ($this->conexao->connect_error) {
                //Caso for encontrado um erro, uma mensagem falando sobre o erro aparecera e o programa sera encerrado
                die("Falha na conexão: " . $this->conexao->connect_error);
            }
        }
    
        //Metodo "Get" para o atributo "conexao"
        public function getConexao() {
            //Retorna "conexao"
            return $this->conexao;
        }
    }
?>