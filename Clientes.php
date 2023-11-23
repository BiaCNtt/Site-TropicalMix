<?php
class Clientes extends model{

	public function adicionar($nome,$data_nascimento, $cpf,$endereco,$email, $senha){
		$sql = "INSERT INTo clientes (nome, data_nascimento, cpf, endereco, email, senha)
		        VALUES (:nome, :data_nascimento, :cpf, :endereco,:email, :senha)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"    , $nome);
		$sql->bindValue(":data_nascimento"   , $data_nascimento);
        $sql->bindValue(":cpf"    , $cpf);
        $sql->bindValue(":endereco", $endereco);
        $sql->bindValue(":email"    , $email);
        $sql->bindValue(":senha"    , $senha);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	public function editar($nome,$data_nascimento, $cpf,$endereco,$email, $senha){
		$sql = "UPDATE clientes
		           SET nome     = :nome
		             , data_nascimento    = :data_nascimento
                     , cpf      = :cpf
                     , endereco = :endereco
                     , email    = :email
                     , senha    = :senha
		         WHERE id_cliente = :id_cliente";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome"     , $nome);
		$sql->bindValue(":data_nascimento"    , $data_nascimento);
        $sql->bindValue(":cpf" , $cpf);
        $sql->bindValue(":endereco" , $endereco);
        $sql->bindValue(":email" , $email);
        $sql->bindValue(":senha" , $senha);
		$sql->bindValue(":id_cliente", $id_cliente);
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