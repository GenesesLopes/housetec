<?php
include 'Sessao.php';
include 'conexao.php';
if(isset($_SESSION["logado"])){
	session_unset();session_destroy();
	$conexao = null;
	header("location: ../index.php");
}else{
	echo "<script>alert('Erro no logoff');location.href=\"paginaPrincipal.php\";";
}
?>
