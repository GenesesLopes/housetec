<?php
include 'conexao.php';
include 'Sessao.php';
if(isset($_POST["cpf"])){
	$cpf = $_POST["cpf"];
	$usuario = 'locatario';
}else if(isset($_POST["cpfadm"])){
	$cpf = $_POST["cpfadm"];
	$senha = md5($_POST["senhaform"]);
	$usuario = 'administrador';
}

try{
	//comando sql para consultar se o usuario for administrador
	if($usuario == 'administrador'){
		//Validando login
		$conexao = administrador();
		$sql = "SELECT * FROM consulta_adm(?,?)";
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(1,$cpf);
		$consulta->bindValue(2,$senha);
		$consulta->execute();

		//procurando dados no banco
		if($consulta->rowCount() > 0){
			//criar sessão com o login do administrador
			$consulta->setFetchMode(PDO::FETCH_OBJ);
			while($result = $consulta->fetch()){
				$nome = $result->adm_nome;
				$status = $result->adm_status;
			}
			if(!$status){
				echo "<script>alert('Usuario Temporariamente desativado, favor entrar em contato com os administradores do sistema!');location.href=\"index.php\";</script>";	
			}
			sessao($nome,$usuario,$cpf);
			//echo "<script>alert('Login realizado!');location.href=\"paginaPrincipal.php\";</script>";
			header("location: paginaPrincipal.php");
		}else{
			echo "<script>alert('Credenciais não conferem!');location.href=\"../index.php\";</script>";
		}


	}else{
		//Validando login locatario 
		$conexao= null;
		$conexao = locatario();
		$sql = "SELECT * FROM consulta_locatario(?) ";
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(1,$cpf);
		$consulta->execute();
		
		 //procurando no banco de dados
		if($consulta->rowCount() > 0){
			//Criando sessão para locatario
			$consulta->setFetchMode(PDO::FETCH_OBJ);
			while($result = $consulta->fetch()){
				$nome = $result->loc_nome;
				$status = $result->loc_status;
			}
			if(!$status){
				echo "<script>alert('Usuario desativado, favor entrar em contato com o proprietario da casa!');location.href=\"index.php\";</script>";	
			}
			sessao($nome,$usuario,$cpf);
			//echo "<script>alert('Login realizado!');location.href=\"paginaPrincipal.php\";</script>";
			header("location: paginaPrincipal.php");
		
		}else{
			//Validando login para funcionario
			$conexao = null;
			$conexao = funcionario();
			$sql = "SELECT * FROM consulta_funcionario(?) ";
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(1,$cpf);
			$consulta->execute();
			
			 //procurando no banco de dados
			if($consulta->rowCount() > 0){
				//Criando sessão para locatario
				$consulta->setFetchMode(PDO::FETCH_OBJ);
				while($result = $consulta->fetch()){
					$nome = $result->func_nome;
					$status = $result->func_status;
				}
				if(!$status){
					echo "<script>alert('Usuario desativado, favor entrar em contato com o proprietario da casa!');location.href=\"index.php\";</script>";	
				}
				$usuario = 'funcionario';
				sessao($nome,$usuario,$cpf);
				//echo "<script>alert('Login realizado!');location.href=\"paginaPrincipal.php\";</script>";
				header("location: paginaPrincipal.php");
			
			}else{
				echo "<script>alert('Credenciais não conferem!');location.href=\"index.php\";</script>";	
			}
			
		}

	}
}catch(PDOException $e){
	/*if($e->getCode() == 42501){
		session_unset();session_destroy();
		$conexao = null;

		//echo "<script>alert('Permissão negada!');location.href=\"../index.php\";</script>";
	}
	else*/
		echo 'ERROR: '. $e->getMessage()."<br><br>";
		echo "<a href=\"../index.php\">Voltar</a>";
	session_unset();session_destroy();
	$conexao = null;
}

?>