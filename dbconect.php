<?php
//conexao com banco de dados


//$servername = "localhost";
$username = "id7682677_gui";
$password = "darck12";
$nomebanco = "id7682677_sistemalogin";

/*//freehostia
$servername = "162.210.102.230";
$username = "guispo_ei";
$password = "darck12";
$nomebanco = "guispo_ei";
*/
$connect = mysqli_connect($servername, $username, $password, $nomebanco);

if(mysqli_connect_error()):
	echo "Falha na conexao: " .mysqli_connect_error();

endif;

?>