<?php
//Conexao
require_once 'dbconect.php';

//Sessão
session_start();

//BOTAO ENVIAR
if(isset($_POST['btnEntrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login)or empty($senha)):
		$erros[] = "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\"><br>O campo Senha/Login deve ser preenchido!!!<br></div>";
	else: 
		$sql = "SELECT login From usuarios WHERE login ='$login'"; 
		$resultado = mysqli_query($connect, $sql);
		if(mysqli_num_rows($resultado) > 0):
			$senha = md5($senha);
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
			$resultado = mysqli_query($connect, $sql);
				if (mysqli_num_rows($resultado) == 1 ):
					$dados = mysqli_fetch_array($resultado);
					mysqli_close($connect);
					$_SESSION['logado'] = true;
					$_SESSION['id_usuario'] = $dados['id'];
					header('Location: home.php');
				else:
					$erros[] = "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\"><br>Usuario e senha não conferem<br></div>";			
				endif;
					
				

		else:
			$erros[] = "<div class=\"alert alert-warning"."\" role=\"alert\" align=\"center\"><br>Usuario inexistente. <br></div>";
		endif;
	endif;

endif;
?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" align="center">
		<h1><b>Login</b></h1>
		<br>

		<?php
		if(!empty($erros)):
			foreach ($erros as $erro):
				echo $erro;
			endforeach;
		endif;
		?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<strong>Login:</strong>  <input type="text" name="login"> <br><br> 
			<strong>Senha: </strong><input type="password" name="senha"><br> <br>
			<button type="submit" name="btnEntrar"> Entrar</button>
		<br><br>
		<a href="cadastro.html">Criar um login</a>


		</form>
	</div>
</body>
</html>