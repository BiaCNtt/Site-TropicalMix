<?php
	//enviando os valores pelo metodo post que ta pegando do form
	$nome     = $_POST['nome'];
    $descricao      = $_POST['descricao'];
	$preco    = floatval($_POST['preco']); 
	$quantidade_em_estoque = intval($_POST['quant']); 


	if(!isset($_POST['nome'])){
		require 'run.php';
		$produtos = new Produtos();
		$id_produto = $produtos->adicionarprodutos($nome, $preco, $quantidade_em_estoque, $descricao);
	}	

	if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){
		// Pasta onde a imagem será salva
		$pasta = 'assets/images';
		// Gera um nome único para o arquivo
		$arquivo = md5(date('Ymdhis').rand(111,999)).'.'.pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		// Move a imagem para a pasta
		move_uploaded_file($_FILES['img']['tmp_name'], $pasta.$arquivo);
		// Atualiza o caminho da imagem no banco de dados
		$produto->imagem($id_produto, $pasta.$arquivo);
	}
?>
