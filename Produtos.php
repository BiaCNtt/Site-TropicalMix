<?php
class produtos extends model{

	public function adicionarprodutos($nome,$preco, $quant,$descricao){
		$sql = "INSERT INTO produtos (nome, preco, quant, descricao)
		        VALUES (:nome, :preco, :quant, :descricao)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
		$sql->bindValue(":preco"   , $preco);
        $sql->bindValue(":quant"   , $quant);
        $sql->bindValue(":descricao"     , $descricao);
		$sql->execute();

		return $this->db->lastInsertId();
	}

        public function imagem($id_produto, $imagem) {
        $sql = "UPDATE produtos
                SET imgP = :imagem 
                WHERE id_produto = :id_produto";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":imagem", $imagem);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
    }

	public function editarprodutos($id_produto,$nome,$preco,$quant,$descricao){
		$sql = "UPDATE pessoa 
		           SET nome     = :nome
		             , preco    = :preco
                     , quant   = :quant
                     , descricao  = :descricao
		         WHERE id_produto = :id_produto";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"     , $nome);
		$sql->bindValue(":preco"    , $preco);
        $sql->bindValue(":quant"    , $quant);
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