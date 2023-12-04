<?php

	//enviando os valores pelo metodo post que ta pegando do form
	$nome     = $_POST['nome'];
    $descricao      = $_POST['descricao'];
	$preco    = floatval($_POST['preco']); 
	$quantidade_em_estoque = intval($_POST['quant']); 

	require 'run.php';
	$produtos = new Produtos();
	$id_produto = null;
	if(isset($_POST['nome'])){
		$id_produto = $produtos->adicionarprodutos($nome,$preco, $quantidade_em_estoque,$descricao);
	}

	if(isset($_FILES['imagem']['name']) && !empty($_FILES['imagem']['name'])){
		// Pasta onde a imagem será salva
		$pasta = 'images/temporario/';
		// Gera um nome único para o arquivo
		$arquivo = md5(date('Ymdhis').rand(111,999)).'.'.pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
		// Move a imagem para a pasta
		move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta.$arquivo);
		// Atualiza o caminho da imagem no banco de dados
		$produtos->imagem($id_produto, $arquivo); 
	}

header("Location: index.php");
exit;


?>

