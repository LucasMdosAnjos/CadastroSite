<?php
require_once("config.php");
$lista = Usuario::getList();
echo "<table width = '467' border='3px' bgcolor='#CCC'>";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>Nome</td>";
echo "<td>Telefone</td>";
echo "</tr>";
for($i=0;$i<count($lista);$i++)
{
	echo "<tr>";
	echo "<td width='101' height='40'>".$lista[$i]['idusuario']."</td><td width='113'>".$lista[$i]['desnome']."</td><td width='140'>".$lista[$i]['destelefone']."</td>";
	echo "</tr>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Cadastro</title>
</head>
<body>
	<form action="\CadastroSite\indexEdit.html" method="post">
		<div>
	<button type="submit">Editar seu Cadastro.</button>
</div>
	</form>
	<br>
	<form action="\CadastroSite\index.html" method = "post">
		<div>
			<button type="submit">Realizar Novo Cadastro.</button>
		</div>
	</form>
</body>
</html>
