<?php 
session_start();

function sessao($nome,$usuario,$cpf){
	$_SESSION["nome"] = $nome;
	$_SESSION["logado"] = true;
	if($usuario=="administrador"){
		$_SESSION["administrador"] = $nome;
		
	}
	else if($usuario == 'locatario')
		$_SESSION["locatario"] = $nome;
	else
		$_SESSION["funcionario"] = $nome;
	
	$_SESSION["cpf"] = $cpf;
}

function validaUsuario(){
	if(isset($_SESSION["administrador"]))
		return 1;
	else if($_SESSION["locatario"])
		return 2;
	else 
		return 3;
}


?>