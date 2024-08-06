<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_Banco_de_Dados/model/pessoa.php';
 
    //Criação da classe "PessoaController", que sera utilizada para efetuar os métodos criados na classe "Pessoa"
    class PessoaController {
        //Definindo o atributo "pessoa", que sera o objeto com os métodos da classe "Pessoa"
        private $pessoa;
 
        //Criação do metodo construtor
        public function __construct() {
            //Instanciando o nosso objeto
            $this->pessoa = new Pessoa();
 
            //Verifica se alguma variavel com o valor igual a "inserir" foi definida no url
            if ($_GET['acao'] == 'inserir') {
                //Executa o metodo "inserir"
                $this->inserir();
            } else if ($_GET['acao'] == 'atualizar') {
                $this->atualizar($_GET['id']);
            }
        }
 
        //Criação do metodo "inserir"
        public function inserir() {
            //Armazena valores nos atributos do nosso objeto
            $this->pessoa->setNome($_POST['nome']);
            $this->pessoa->setEndereco($_POST['endereco']);
            $this->pessoa->setBairro($_POST['bairro']);
            $this->pessoa->setCep($_POST['cep']);
            $this->pessoa->setCidade($_POST['cidade']);
            $this->pessoa->setEstado($_POST['estado']);
            $this->pessoa->setTelefone($_POST['telefone']);
            $this->pessoa->setCelular($_POST['celular']);
 
            $this->pessoa->inserir();
        }
 
        //Criação do metodo "listar"
        public function listar() {
            //Executa o metodo "listar", que foi declarado na classe "Pessoa"
            return $this->pessoa->listar();
        }
       
        public function buscarPorId($id) {
            return $this->pessoa->buscarPorId($id);
        }
 
        public function atualizar($id) {
            $this->pessoa->setId($id);
            $this->pessoa->setNome($_POST['nome']);
            $this->pessoa->setEndereco($_POST['endereco']);
            $this->pessoa->setBairro($_POST['bairro']);
            $this->pessoa->setCep($_POST['Cep']);
            $this->pessoa->setCidade($_POST['cidade']);
            $this->pessoa->setEstado($_POST['estado']);
            $this->pessoa->setTelefone($_POST['telefone']);
            $this->pessoa->setCelular($_POST['celular']);
 
            $this->pessoa->atualizar($id);
        }

        public function excluir($id) {
            $this->pessoa->excluir($id);
        }
    }
 
//Execução do código
new PessoaController();
?>