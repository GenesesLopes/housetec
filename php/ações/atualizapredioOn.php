<?php 
include '../conexao.php';
include '../Sessao.php';
 $bairro = $_POST["bairro"];
 $numero = $_POST["numero"];
 $cep = $_POST["cep"];
 $rua = $_POST["rua"];
 $nome = $_POST["nome"];
 $id = $_POST["idpredio"];

//chamando a validação do usuario no banco
 if(validaUsuario() == 1)
 	$conexao = administrador();
 else if (validaUsuario() ==2 )
 	$conexao = locatario();
 else 
 	$conexao = funcionario();
 try{
	 //chamando a função sql
	 $sql = "SELECT atualiza_edificio(?,?,?,?,?,?)";
	 $cadastro = $conexao->prepare($sql);
	 $cadastro->bindValue(1,$bairro);
	 $cadastro->bindValue(2,$numero);
	 $cadastro->bindValue(3,$cep);
	 $cadastro->bindValue(4,$rua);
	 $cadastro->bindValue(5,$nome);
	 $cadastro->bindValue(6,$id);
	 $cadastro->execute();

	 echo "<script>alert('Dados atualizados com sucesso...');location.href=\"../paginaPrincipal.php\";</script>";
}catch(PDOException $e){
		echo 'ERROR: '. $e->getMessage();
		echo "<br><br><a href=\"../predio.php\">Voltar</a>";
}

?>