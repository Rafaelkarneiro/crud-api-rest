<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'cadastrar')
	{
		$form_data = array(
			'nome'	=>	$_POST['nome'],
			'email'		=>	$_POST['email'],
			'data_nasc'		=>	$_POST['data_nasc'],
			'senha'		=>	$_POST['senha']
		);
		$api_url = "http://localhost/phpApps/crud-api-rest/api/test_api.php?action=cadastrar";  //Altere este URL de acordo com o caminho da pasta "api".
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'buscar_usuario')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/phpApps/crud-api-rest/api/test_api.php?action=buscar_usuario&id=".$id."";  //Altere este URL de acordo com o caminho da pasta "api".
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'atualizar')
	{
		$form_data = array(
			'nome'	=>	$_POST['nome'],
			'email'		=>	$_POST['email'],
			'data_nasc'		=>	$_POST['data_nasc'],
			'senha'		=>	$_POST['senha'],
			'id'			=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/phpApps/crud-api-rest/api/test_api.php?action=atualizar";  //Altere este URL de acordo com o caminho da pasta "api".
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'deletar')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/phpApps/crud-api-rest/api/test_api.php?action=deletar&id=".$id.""; //Altere este URL de acordo com o caminho da pasta "api".
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>