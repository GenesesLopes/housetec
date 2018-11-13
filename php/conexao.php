<?php

try{
	
		//$conexao = new PDO('mysql:host=localhost; dbname=site', 'root', 'lopes28');
	function administrador(){
		$conexao = new PDO('pgsql:dbname=housetec; host=localhost', 'administrador', '1234');
       	$conexao->exec("set names utf8");
       	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	return $conexao;
	}
	function locatario(){
		$conexao = new PDO('pgsql:dbname=housetec; host=localhost', 'locatario', '1234');
       	$conexao->exec("set names utf8");
       	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	return $conexao;
	}
	function funcionario(){
		$conexao = new PDO('pgsql:dbname=housetec; host=localhost', 'funcionario', '1234');
       	$conexao->exec("set names utf8");
       	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	return $conexao;
	}
		
           	
}
catch(PDOException $e){
		echo 'ERROR: '. $e->getMessage();
		$conexao = null;
}


?>
