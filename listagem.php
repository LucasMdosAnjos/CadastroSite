<?php
require_once("config.php");
$lista = Usuario::getList();
echo "<table border='1'>";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>Nome</td>";
echo "<td>Telefone</td>";
echo "</tr>";
for($i=0;$i<count($lista);$i++)
{
	echo "<tr>";
	echo "<td>".$lista[$i]['idusuario']."</td><td>".$lista[$i]['desnome']."</td><td>".$lista[$i]['destelefone']."</td>";
	echo "</tr>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Cadastro</title>
</head>
<body>
	<form action="index.html" method="post">
	<button type="submit">Editar Cadastro.</button>
	</form>
</body>
</html>
