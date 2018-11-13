<?php
include '../../conexao.php';
include '../../Sessao.php';

if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
	//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
	 	$conexao = administrador();
	 else if (validaUsuario() ==2 )
	 	$conexao = locatario();
	 else 
	 	$conexao = funcionario();

	 $idedificio = $_POST['idedificio'];

	 //consulta sql
	 $sql = "SELECT * FROM consulta_apartamento_cadastro_locatario(?)";
	 $consulta = $conexao->prepare($sql);
	 $consulta->bindValue(1,$idedificio);
	 $consulta->execute();
	 $consulta->setFetchMode(PDO::FETCH_OBJ);
?>
<div class="form-group ">
	<label for="idapartamento_cadastro" class="col-sm-2 control-label">Id do apartamento</label>
		<div class="form-group col-md-4" align="left">
			<select nome="idapartamento_cadastro" id="idapartamento_cadastro" required class="form-control">
				<option selected disabled>Escolha um Apartamento</option>
					<?php
						while($result = $consulta->fetch()){
						?>
						<option value="<?php echo $result->ap_id;?>"><?php echo $result->ap_id;?></option>
					<?php }?>
			</select>
		</div><br>
</div>
<?php
}
?>