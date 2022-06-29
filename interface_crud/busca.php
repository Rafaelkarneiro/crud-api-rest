<?php

//busca.php

$api_url = "http://localhost/phpApps/crud-api-rest/api/test_api.php?action=buscar_usuarios";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if($result!="")
{
	if(count($result) > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->nome.'</td>
				<td>'.$row->email.'</td>
				<td>'.$row->data_nasc.'</td>
				<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Editar</button></td>
				<td><button type="button" name="deletar" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Deletar</button></td>
			</tr>
			';
		}
	}
}
else{
	$output .= '
	<tr>
		<td colspan="5" align="center">Nenhum Usuário Cadastrado!</td>
	</tr>
	';
}
echo $output;

?>