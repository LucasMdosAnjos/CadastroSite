<?php
require_once("config.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
if($_POST["email"]=="" ||$_POST["telefone"]=="" ||$_POST["nome"]=="")
{
	echo "Insira Valores de email/telefone/nome para poder continuar!";
	echo "<br>";
	echo "<form action='index.html' method='post'>
			<button type='submit'>Voltar</button>
			</form>";
}else
{
	echo "Formulario enviado com sucesso!";
	echo "<br>";
	
	$image = $_FILES['image'];
	$user = new Usuario();
	$user->setFile($image);
	$user->setNome($_POST["nome"]);
	$user->setEmail($_POST["email"]);
	$user->setTelefone($_POST["telefone"]);
	$user->setBairro($_POST['bairro']);
	$user->setCep($_POST['cep']);
	$user->setUf($_POST['uf']);
	$user->setCidade($_POST['cidade']);
	$user->setEndereco($_POST['endereco']);
	$user->setTipoRevistinha($_POST['tipo_de_revistinha']);
	$user->setQuantidade($_POST['quantidade']);
	$user->setAtracoes($_POST['atracoes']);
	$user->setSugestao($_POST['sugestao']);
	$user->insert();
	$file = fopen("idUsuario.txt","w+");
	$lista = Usuario::getList();
	fwrite($file,$lista[count($lista)-1]["idusuario"]);
	$result = array();
	$result = EnviarEmail();
	for($i=0;$i<count($result);$i++)
	{
		if($result[$i])
		{
			echo $i+1 . "º email enviado!";
			echo "<br>";
		}
	}
	
}
}
function EnviarEmail():array
{
	$tipo = $_POST['tipo_de_revistinha'];
	$quantidade = $_POST['quantidade'];
	$enviaremail = array();
	try{
$enviaremail[0] = mail($_POST['email'], "Cadastro Confirmado", "Você concluiu seu cadastro de dados para entrega e produção! Agora é só esperar seu(sua) $tipo chegar na quantidade de $quantidade peças!");
}catch(Exception $e)
{
	echo $e;
}
$enviaremail[1] = mail("davi@signoweb.com.br", "Cadastro Confirmado", "Você concluiu seu cadastro de dados para entrega e produção! Agora é só esperar seu(sua) $tipo chegar!");
return $enviaremail;
}
?>
<a href=\CadastroSite\listagem.php\>Ver lista de cadastros</a>