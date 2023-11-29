<?php  //enviando os valores pelo metodo post que ta pegando do form
    $nome      = $_POST['nome'];
    $data_nascimento= $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $celular =  $_POST['celular'];
    $endereco  = $_POST['endereco'];
    $email= $_POST['email'];
    $senha = $_POST['senha'];


    if(!isset($_POST['nome'])) { // Checa se o campo 'nome' não foi enviado no formulário
        require 'run.php'; // Inclui o arquivo 'run.php'
        $clientes = new Clientes(); // Cria uma instância da classe Clientes
        $clientes->adicionarclientes($nome, $data_nascimento, $cpf, $celular, $endereco, $email, $senha); // Chama o método 'adicionar' da instância de Clientes com os parâmetros fornecidos
    }
    
header("Location: login.php");
exit;
?>
