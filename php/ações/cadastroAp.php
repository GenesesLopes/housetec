<?php
include '../Sessao.php';
include '../conexao.php';

if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
	$idpredio = $_POST["idpredio"];
	$numero = $_POST["numeroAp"];
	$quartos = $_POST["quartos"];
	//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
	 	$conexao = administrador();
	 else if (validaUsuario() ==2 )
	 	$conexao = locatario();
	 else 
	 	$conexao = funcionario();
	 
	 try{
	 	//chamar a função sql de cadastro
	 	$sql = "SELECT cadastra_apartamento(?,?,?)";
	 	$cadastra = $conexao->prepare($sql);
	 	$cadastra->bindValue(1,$idpredio);
	 	$cadastra->bindValue(2,$numero);
	 	$cadastra->bindValue(3,$quartos);
	 	$cadastra->execute();

	 	if($cadastra->rowCount())
            echo "<script>alert('Apartamento cadastrado!');location.href=\"../paginaPrincipal.php\";</script>";
     }catch(PDOException $e){
			echo 'ERROR: '. $e->getMessage();
			echo "<br><br><a href=\"../predio.php\">Voltar</a>";
	}
}

?>