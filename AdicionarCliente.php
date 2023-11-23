<?php
    $nome      = $_POST['nome'];
    $data_nascimento= $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $endereco  = $_POST['endereco'];
    $email= $_POST['email'];
    $senha = $_POST['senha'];

if(!isset($POST['nome'])){ //checa o método e não permitir incluir após eles
    require  'run.php';
    $clientes = new Clientes();
    $clientes->adicionar($nome,$data_nascimento, $cpf,$endereco,$email, $senha);
}


header("Location: cadastro.php");
exit;
?>
