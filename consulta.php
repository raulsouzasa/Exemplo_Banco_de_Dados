<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_Banco_de_Dados/controller/pessoaController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    //Instanciando um objeto com a classe "PessoaController"
                    $pessoaController = new PessoaController();

                    //Executando o metodo "listar"
                    $pessoas = $pessoaController->listar();

                    //Percorrendo o vetor e os apresentando na tela
                    foreach($pessoas as $pessoa) {
                        echo "<th>" . $pessoa['nome'] . "</th>";
                        echo "<th>" . $pessoa['telefone'] . "</th>";
                        echo "<th>" . $pessoa['celular'] . "</th>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>