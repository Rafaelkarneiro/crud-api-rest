<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciador de Usuários</title>
		<link rel="shortcut icon" href="img/api.png" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="container">
			<br>
			<h1 align="center">Gerenciador de Usuários</h1>
			<br>
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Cadastrar</button>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Data de Nascimento</th>
							<th>Editar Usuário</th>
							<th>Deletar Usuário</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Cadastrar Usuário</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Nome</label>
			        	<input type="text" name="nome" id="nome" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Email</label>
			        	<input type="email" name="email" id="email" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label>Data de Nascimento</label>
			        	<input type="date" name="data_nasc" id="data_nasc" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label>Senha</label>
			        	<input type="password" name="senha" id="senha" class="form-control" />
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="cadastrar" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"busca.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('cadastrar');
		$('#button_action').val('Cadastrar');
		$('.modal-title').text('Cadastrar Usuário');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#nome').val() == '')
		{
			alert("Digite seu Nome");
		}
		else if($('#email').val() == '')
		{
			alert("Digite seu Email");
		}
		else if($('#data_nasc').val() == '')
		{
			alert("Insira sua Data de Nascimento");
		}
		else if($('#senha').val() == '')
		{
			alert("Digite sua Senha");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'cadastrar')
					{
						alert("Usuário Cadastrado com Sucesso!");
					}
					if(data == 'atualizar')
					{
						alert("Usuário Editado com Sucesso!");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'buscar_usuario';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#nome').val(data.nome);
				$('#email').val(data.email);
				$('#data_nasc').val(data.data_nasc);
				$('#senha').val(data.senha);
				$('#action').val('atualizar');
				$('#button_action').val('Editar');
				$('.modal-title').text('Editar Usuário');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'deletar';
		if(confirm("Você tem certeza que deseja remover esse usuário da base de dados?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Usuário deletado com sucesso!");
				}
			});
		}
	});

});
</script>