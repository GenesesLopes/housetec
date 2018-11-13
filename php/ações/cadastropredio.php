<?php 
include '../conexao.php';
include '../Sessao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
	 $bairro = $_POST["bairro"];
	 $numero = $_POST["numero"];
	 $cep = $_POST["cep"];
	 $rua = $_POST["rua"];
	 $nome = $_POST["nome"];
	 $cpf = $_SESSION["cpf"];

	//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
	 	$conexao = administrador();
	 else if (validaUsuario() ==2 )
	 	$conexao = locatario();
	 else 
	 	$conexao = funcionario();
	 try{
		 //chamando a função sql
		 $sql = "SELECT cadastra_edificio(?,?,?,?,?,?)";
		 $cadastro = $conexao->prepare($sql);
		 $cadastro->bindValue(1,$bairro);
		 $cadastro->bindValue(2,$numero);
		 $cadastro->bindValue(3,$cep);
		 $cadastro->bindValue(4,$rua);
		 $cadastro->bindValue(5,$nome);
		 $cadastro->bindValue(6,$cpf);
		 $cadastro->execute();

		 echo "<script>alert('Predio cadastrado com sucesso...');location.href=\"../paginaPrincipal.php\";</script>";
		/*
		//conferindo se o predio já esta cadastrado
		$sql = "SELECT * FROM edificio WHERE nome = ? AND cpfadm = ? ";
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(1,$nome);
		$consulta->bindValue(2,$cpf);
		$consulta->execute();

		if($consulta->rowCount()){//Caso a condição seja verdadeira
			echo "<script>alert('Prédio já cadastrado, favor fornecer outros dados!');location.href=\"prediocadastrar.php\";</script>";
		}else{
			//inserindo dados no banco de dados
			$sql = "INSERT INTO edificio VALUES (default,?,?,?,?,?,?) ";
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(1,$bairro);
			$consulta->bindValue(2,$numero);
			$consulta->bindValue(3,$cep);
			$consulta->bindValue(4,$rua);
			$consulta->bindValue(5,$nome);
			$consulta->bindValue(6,$cpf);
			$consulta->execute();

		}*/
	}catch(PDOException $e){
			echo 'ERROR: '. $e->getMessage();
			echo "<br><br><a href=\"../predio.php\">Voltar</a>";
	}
}
?>