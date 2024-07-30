<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_Banco_de_Dados/controller/conexao.php';
 
    //Criação da classe "Pessoa", que contera os métodos e atributos para efetuarmos ações no banco de dados
    class Pessoa {
 
        //Definindo os atributos
        private $id;
        private $nome;
        private $endereco;
        private $bairro;
        private $cep;
        private $cidade;
        private $estado;
        private $telefone;
        private $celular;
        private $conexao;
       
       //Criação dos métodos "Get" e "Set" para cada atributo da classe
        public function getId() {
            return $this->id;
        }
 
        public function setId($id) {
            $this->id = $id;
        }
 
        public function getNome() {
            return $this->nome;
        }
 
        public function setNome($nome) {
            $this->nome = $nome;
        }
 
        public function getEndereco() {
            return $this->endereco;
        }
 
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
 
        public function getBairro() {
            return $this->bairro;
        }
 
        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }
 
        public function getCep() {
            return $this->cep;
        }
 
        public function setCep($cep) {
            $this->cep = $cep;
        }
 
        public function getCidade() {
            return $this->cidade;
        }
 
        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
 
        public function getEstado() {
            return $this->estado;
        }
 
        public function setEstado($estado) {
            $this->estado = $estado;
        }
 
        public function getTelefone() {
            return $this->telefone;
        }
 
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
 
        public function getCelular() {
            return $this->celular;
        }
        public function setCelular($celular) {
            $this->celular = $celular;
        }
 
        //Criação do metodo "inserir"
        public function inserir() {
            //Armazenara na variavel "sql" o comando SQL que sera executado
            $sql = "INSERT INTO pessoa ('nome', 'endereco', 'bairro', 'cep', 'cidade', 'estado', 'telefone', celular') VALUES (?,?,?,?,?,?,?,?)";
           
            //"stmt" tera o metodo "prepare", que prepara uma instrução SQL para ser executada
            //Nesse caso ele executara o codigo em "sql"
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade,$this->estado, $this->telefone, $this->celular);
            return $stmt->execute();
        }
 
        //Criação do metodo "listar"
        public function listar() {
            //Armazenara em "sql" um codigo SQL que """printa""" a nossa tabela inserida no banco de dados
            $sql = "SELECT * FROM pessoa";
 
            //"stmt" tera o metodo "prepare", que prepara uma instrução SQL para ser executada
            //Nesse caso ele executara o codigo em "sql"
            $stmt = $this->conexao->getconexao()->prepare($sql);
            $stmt->execute();
 
            //"result" tera a resposta da nossa execução com o "stmt"
            $result = $stmt->get_result();
 
            //Criação do vetor "pessoas" que ira armazenar os valores dados em "result"
            $pessoas = [];
 
            //Laço de repetição que armazenara os valores do "result" no vetor
            while ($pessoa = $result->fetch_assoc()) {
                $pessoas[] = $pessoa;
            }
 
            //retorna o vetor "pessoas"
            return $pessoas;
        }
        
        //Criação do metodo "buscarPorId"
        public function buscarPorId($id) {
            //Armazenara em "sql" um codigo SQL que """printa""" os campos onde o id corresponde com o id colocado
            $sql = "SELECT * FROM pessoa WHERE id = ?";

            //"stmt" tera o metodo "prepare", que prepara uma instrução SQL para ser executada
            //Nesse caso ele executara o codigo em "sql"
            $stmt = $this->conexao->getconexao()->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        
        //Criação do metodo "atualizar"
        public function atualizar($id) {
            //Armazenara em "sql" um codigo SQL que ira atualizar a nossa tabela
            $sql = "UPDATE pessoa SET nome = ?, endereco = ?, bairro = ?, cep = ?, cidade = ?, estado = ?, telefone = ?, celular = ? WHERE id = ?";

            //"stmt" tera o metodo "prepare", que prepara uma instrução SQL para ser executada
            //Nesse caso ele executara o codigo em "sql"
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param('ssssssssi', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade,$this->estado, $this->telefone, $this->celular);
            return $stmt->execute();
        }

        //Criação do metodo "excluir"
        public function excluir($id) {
            //Armazenara em "sql" um codigo SQL que ira excluir um dado da nossa tabela
            $sql = "DELETE FROM pessoa WHERE id = ?";

            //"stmt" tera o metodo "prepare", que prepara uma instrução SQL para ser executada
            //Nesse caso ele executara o codigo em "sql"
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param('i', $id);
            return $stmt->execute();
        }
    }