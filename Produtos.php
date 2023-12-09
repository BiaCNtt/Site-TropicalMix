<?php
class Produtos extends model{

	public function adicionarprodutos($nome,$preco, $quantidade_em_estoque,$descricao){
		$sql = "INSERT INTO produtos (nome, preco,quantidade_em_estoque , descricao)
		        VALUES (:nome, :preco, :quant, :descricao)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
		$sql->bindValue(":preco"   , $preco);
        $sql->bindValue(":quant"   , $quantidade_em_estoque);
        $sql->bindValue(":descricao"     , $descricao);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	//function pra atualizar a quantidade em estoque

	public function atualizar_estoque($id_produto,$quantidade_em_estoque){
		$sql = "UPDATE produtos SET 
		quantidade_em_estoque   = :quantidade
		where id_produto = :id_produto";

	    $sql = $this->db->prepare($sql);
		$sql->bindValue(":quantidade", $quantidade_em_estoque);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->execute();
	}



	//função de editar os produtos
	public function editarprodutos($id_produto,$nome,$preco,$quantidade_em_estoque,$descricao){
		$sql = "UPDATE pessoa 
		           SET nome     = :nome
		             , preco    = :preco
                     , quantidade_em_estoque   = :quant
                     , descricao  = :descricao
		         WHERE id_produto = :id_produto";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"     , $nome);
		$sql->bindValue(":preco"    , $preco);
        $sql->bindValue(":quantidade_em_estoque"    , $$quantidade_em_estoque);
        $sql->bindValue(":descricao"      , $descricao);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->execute();
	}

	public function excluirprodutos($id_produto){
		$sql = "DELETE FROM produtos WHERE id_produto = :id_produto";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->execute();
	}
	
	////função da imagem
	public function imagem($id_produto, $imagem) {
        $sql = "UPDATE produtos
                SET imagem = :imagem 
                WHERE id_produto = :id_produto";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":imagem", $imagem);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
    } 


	public function get($id_produto){
		$array = array();

		$sql = "SELECT * 
		          FROM produtos
		         WHERE id_produto = :id_produto";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_produto', $id_produto);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM produtos ORDER BY nome";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}
}