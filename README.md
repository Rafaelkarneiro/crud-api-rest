# crud-api-rest
<h1>Configurações de Uso da API:</h1>
<h2><span style="color: red;">Passo #1:</span> Crie um banco de dados: "bd_crud";</h2>
<h3><span style="color: red;">Passo #1.1:</span> Baixe o banco de dados "crud-api-rest/bd_crud.sql" e importe dentro do banco de dados criado: "bd_crud";</h3>
<p style="color: red;">OBS: Caso prefira criar a tabelas manualmente, siga os passos: #1.2 e #1.3;</p>
<h3><span style="color: red;">(Opcional)Passo #1.2:</span> Dentro de "bd_crud" crie uma tabela: "usuarios";</h3>
<h3><span style="color: red;">(Opcional)Passo #1.3:</span> Dentro de "usuarios" crie as colunas: ("nome" do tipo "varchar(250)"), ("email" do tipo "varchar(250)"), ("data_nasc" do tipo "date"), ("senha" do tipo "varchar(250)");</h3>
<h2><span style="color: red;">Passo #2:</span> No documento "api/Api.php", dentro da função "conectar_bd()" linha 14, mude os parâmetros da classe "PDO" linha 16, de acordo com seu servidor, nome de usuário e senha;</h2>
<h2><span style="color: red;">Passo #3:</span> No documento "interface-crud/action.php" nas linhas: [15, 39, 54, 77], altere os URLs das variáveis "$api_url" de acordo com o caminho da pasta "api";</h2>
<br>
<h2>Tecnologias Usadas no projeto: HTML, CSS, JavaScript, PHP, MySQL, Json, AJAX, Jquery, Bootstrap;</h2>