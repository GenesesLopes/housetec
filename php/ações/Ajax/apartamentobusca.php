<?php include '../../Sessao.php';
include '../../conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
	sleep(1);
	$idPredio = $_POST['locPredio'];
		//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
	 	$conexao = administrador();
	 else if (validaUsuario() ==2 )
	 	$conexao = locatario();
	 else 
	 	$conexao = funcionario();
	 try{
	 	//chamando a função sql
	 	$sql = "SELECT * FROM consulta_apartamento(?)";
	 	$consulta = $conexao->prepare($sql);
	 	$consulta->bindValue(1,$idPredio);
	 	$consulta->execute();
	 	$consulta->setFetchMode(PDO::FETCH_OBJ);
	 	?>
	 	<table class="table table-condensed">
		 	<tr><td>Id do Apartamento</td><td>Número</td><td>Qtde quartos</td><td>Id do edificio</td><td>Data de Cadastro</td></tr>
			<?php while($result = $consulta->fetch()){ ?>
				<tr><td><?php echo $result->ap_idapartamento;?></td><td><?php echo $result->ap_numeroap;?></td><td><?php echo $result->ap_quartos; ?></td><td><?php echo $result->ap_idedificio; ?></td><td><?php echo $result->ap_datacadastro;?></td></tr>
			<?php }?>
		</table>
<?php }catch(PDOException $e){
			echo 'ERROR: '. $e->getMessage();
			echo "<br><br><a href=\"../apartamento.php\">Voltar</a>";
	}

}
?>