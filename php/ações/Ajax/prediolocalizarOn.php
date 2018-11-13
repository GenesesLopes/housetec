<?php include '../../Sessao.php';
include '../../conexao.php';
	sleep(1);
	$idpredio = $_POST["locPredio"];
	//chamando a validação do usuario no banco
 if(validaUsuario() == 1)
 	$conexao = administrador();
 else if (validaUsuario() ==2 )
 	$conexao = locatario();
 else 
 	$conexao = funcionario();
 
?>	

<table class="table table-condensed">
		<tr><td>Id</td><td>Nome</td><td>Numero</td><td>Rua</td><td>Cep</td><td>Bairro</td></tr>
		<?php 
			$sql = "SELECT * FROM consulta_edificio(?)";
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(1,$idpredio);
			$consulta->execute();	
			$consulta->setFetchMode(PDO::FETCH_OBJ);
			while($result = $consulta->fetch()){
		?>
		
		<tr><td><?php echo $result->ed_id;?>	
		</td><td><?php echo $result->ed_nome;?></td><td><?php echo $result->ed_numero;?></td><td><?php echo $result->ed_rua;?></td><td><?php echo $result->ed_cep;?><td><?php echo $result->ed_bairro;?></td></td></tr>
		<?php }?>	
</table>
