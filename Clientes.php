<?php
class Clientes extends model{

	public function cadastro($nome, $cpf,$celular,$endereco,$email){
		$sql = "INSERT INTO clientes (nome, cpf, celular, endereco, email)
		        VALUES (:nome, :cpf, :celular, :endereco,:email)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
        $sql->bindValue(":cpf"    , $cpf);
		$sql->bindValue(":celular", $celular);
        $sql->bindValue(":endereco", $endereco);
        $sql->bindValue(":email"    , $email);

		$sql->execute();

		return $this->db->lastInsertId();
	}


	public function editar($nome, $cpf,$celular,$endereco,$email){
		$sql = "UPDATE clientes
		           SET nome     = :nome
                     , cpf      = :cpf
					 , celular  = :celular
                     , endereco = :endereco
                     , email    = :email
		         WHERE id_cliente = :id_cliente";

				$sql = $this->db->prepare($sql);
				$sql->bindValue(":nome"    , $nome);
				$sql->bindValue(":cpf"    , $cpf);
				$sql->bindValue(":celular", $celular);
				$sql->bindValue(":endereco", $endereco);
				$sql->bindValue(":email"    , $email);

				$sql->execute();
	}

	public function excluir($id_clientes){
		$sql = "DELETE FROM clientes WHERE id_cliente = :id_cliente";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_cliente", $id_cliente);
		$sql->execute();
	}

	public function get($id_clientes){
		$array = array();

		$sql = "SELECT * 
		          FROM clientes
		         WHERE id_cliente = :id_cliente";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_cliente', $id_cliente);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM clientes ORDER BY NOME";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}		

		return $array;
	}
}