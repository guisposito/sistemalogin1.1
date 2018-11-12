<?php
//conexao
require_once 'dbconect.php';

// Sessão
session_start();

//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios where id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina do usuário</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<!---<script type="text/javascript">
	alert("Seja Bem vindo(a)!!!");
</script>--->
<body>
	<div class="container">
		<div class="alert alert-success" align="center">
		  <strong>Bem vindo(a) !!</strong> 
		</div>
			<h1>Olá <?php echo $dados['nome']; ?></h1>
			<hr>

		<div class="botton" align="botton">
			<a href="logout.php">Sair</a>
		</div>
	</div>
</body>
</html>