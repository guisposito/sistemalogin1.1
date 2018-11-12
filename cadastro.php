<html>
<head>
<title> Cadastro </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

</body>

<?php
//Conexao com o banco
require_once 'dbconect.php';

// recebe dados do formulario
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = MD5($_POST['senha']);


// verifica se o usuario digitou o login
if($login == "") {
	echo "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\">";
	echo"<br>O campo Login deve ser preenchido!!!<br>
         <a href='cadastro.html'>Voltar</a><br>";
	echo "</div>";
	exit;
} else {
	// se o usuario digitou o login ele verifica
	// se esta disponivel
	$consulta = "SELECT login From usuarios WHERE login ='$login'";
	$resultado = mysqli_query($connect, $consulta);
	$linha = mysqli_num_rows($resultado);
	if($linha != 0) {
		 echo "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\">";
		 echo"<br><br>O nome de usuario que você<br>
			  Digitou já existe tente outro!
			  <br><br>
			  <a href='cadastro.html'>Voltar</a><br>";
		 echo "</div>";

		exit;
	}
}
// verifica se o usuario digitou a senha
if(empty(md5($senha))){
	echo "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\">";
	echo"<br>O campo Senha deve ser preenchido!!!<br>
	     <a href='cadastro.html'>Voltar</a><br>";
	echo "</div>";
	exit;
}


// verifica se o usuario digitou o nome
if($nome == "") {
	echo "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\">";
	echo"<br>O Nome deve ser preenchido!!!<br>
			<a href='cadastro.html'>Voltar</a><br><br>";
	echo "</div>";
	exit;
}
// faz consulta no banco para inserir os dados do usuario
$sql = "INSERT INTO usuarios (id, nome, login, senha) VALUES (null,'$nome','$login','$senha')";
// MOSTRA ERRO MYSQL
mysqli_query($connect, $sql); // INSERE NO BANCO
mysqli_commit($connect);  // EXECUTA A TRANSAÇÃO
mysqli_close($connect);  // ENCERRA CONEXAO MySQL


// verifica se o usuario foi cadastrado
if($consulta) {
	echo "<div class=\"alert alert-success"."\" role=\"alert\" align=\"center\">";
     echo  "Você foi cadastrado com sucesso!!<br>
     		Click <a href=index.php>aqui</a> para efetuar o login";
     echo "</div>";
	//echo "<font color=green><b>
		//  Você foi cadastrado com sucesso!<br>
		//  Click <a href=index.php>aqui</a> para efetuar o login.
		 // </font></b>";
	exit;
} else {
	echo "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\">";
	echo"<br>Não foi possivel efetuar o seu cadastro<br>
		  tente mais tarde pode ser um problema no servidor!<br><br>
		  Click <a href=index.php>aqui</a> para ir ate a home page do sistema.";
	echo "</div>";
	exit;
}
?>

</html>

