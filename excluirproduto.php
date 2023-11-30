<?php
require 'run.php';
include 'Produtos.php';

	$id_produto = $_GET['id_produto'];
	if(isset($id_produto) && !empty($id_produto)){
        $produtos = new Produtos();
		$produtos->excluirprodutos($id_produto);
	}	

header("Location: Listarprodutos.php");
exit;
?>

