<?php

//test_api.php

include('Api.php');

$api_object = new API();

if($_GET["action"] == 'buscar_usuarios')
{
	$data = $api_object->buscar_usuarios();
}

if($_GET["action"] == 'cadastrar')
{
	$data = $api_object->cadastrar();
}

if($_GET["action"] == 'buscar_usuario')
{
	$data = $api_object->buscar_usuario($_GET["id"]);
}

if($_GET["action"] == 'atualizar')
{
	$data = $api_object->atualizar();
}

if($_GET["action"] == 'deletar')
{
	$data = $api_object->deletar($_GET["id"]);
}

echo json_encode($data);

?>