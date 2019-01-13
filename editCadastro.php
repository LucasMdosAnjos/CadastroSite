<?php
require_once("config.php");
if($_SERVER["REQUEST_METHOD"]==="POST")
{
	if ($_POST["info"]=="") {
		echo "<p><strong>Campos não foram preenchidos, volte e tente novamente.</strong></p>";
		echo "<br>";
		echo "<a href=\CadastroSite\indexEdit.html>Voltar</a>";
	}else{
	$campo = $_POST["option"];
	$value = $_POST["info"];
	$id = file_get_contents("idUsuario.txt");
	$id = intval($id);
	$user = new Usuario();
	$user->update($id,$campo,$value);
	echo "<br>";
	echo "<a href='\CadastroSite\listagem.php\'>Ver listagem atualizada.</a>";
}
}
?>