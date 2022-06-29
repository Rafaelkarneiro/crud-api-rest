<?php

//Api.php

class API
{
	private $connect;

	function __construct()
	{
		$this->conectar_bd();
	}

	function conectar_bd()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=bd_crud", "root", "");
	}

	function buscar_usuarios()
	{
		$query = "SELECT * FROM usuarios ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function cadastrar()
	{
		if(isset($_POST["nome"]))
		{
			$form_data = array(
				':nome'		=>	$_POST["nome"],
				':email'		=>	$_POST["email"],
				':data_nasc'	=>	$_POST['data_nasc'],
				':senha'	=>	$_POST['senha']
			);
			$query = "
			INSERT INTO usuarios 
			(nome, email, data_nasc, senha) VALUES 
			(:nome, :email, :data_nasc, :senha)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function buscar_usuario($id)
	{
		$query = "SELECT * FROM usuarios WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['nome'] = $row['nome'];
				$data['email'] = $row['email'];
				$data['data_nasc'] = $row['data_nasc'];
				$data['senha'] = $row['senha'];
			}
			return $data;
		}
	}

	function atualizar()
	{
		if(isset($_POST["nome"]))
		{
			$form_data = array(
				':nome'	=>	$_POST['nome'],
				':email'	=>	$_POST['email'],
				':data_nasc'	=>	$_POST['data_nasc'],
				':senha'	=>	$_POST['senha'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE usuarios 
			SET nome = :nome, email = :email, data_nasc = :data_nasc, senha = :senha 
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function deletar($id)
	{
		$query = "DELETE FROM usuarios WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>