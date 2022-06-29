# crud-api-rest
Gerenciador de Usuários (API Rest) feito em PHP.

<h1>Configurações de Uso da API:</h1>
<br>
<h2>Passo #1: Crie um banco de dados: "bd_crud";</h2>
<br>
<h3>Passo #1.1: Baixe o banco de dados "crud-api-rest/bd_crud.sql" e importe dentro do banco de dados criado: "bd_crud";</h3>
<p>OBS: Caso prefira criar a tabelas manualmente, siga os passos: #1.2 e #1.3;</p>
<h3>Passo #1.2: Dentro de "bd_crud" crie uma tabela: "usuarios";</h3>
<h3>Passo #1.3: Dentro de "usuarios" crie as colunas: ("nome" do tipo "varchar(250)"), ("email" do tipo "varchar(250)"), ("data_nasc" do tipo "date"), ("senha" do tipo "varchar(250)");</h3>
<br>
<h2>Passo #2: No documento "api/Api.php", dentro da função "conectar_bd()" linha 14, mude os parâmetros da classe "PDO" linha 16, de acordo com seu servidor, nome de usuário e senha;</h2>
<br>
<h2>Passo #3: No documento "interface-crud/action.php" nas linhas: [15, 39, 54, 77], altere os URLs das variáveis "$api_url" de acordo com o caminho da pasta "api";</h2>
<br>
<p>Tecnologias Usadas no projeto: HTML, CSS, JavaScript, PHP, MySQL, Json, AJAX, Jquery, Bootstrap;</p>


