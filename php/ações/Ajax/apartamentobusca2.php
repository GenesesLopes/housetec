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
	 	while($result = $consulta->fetch()){
	 	?>
	 	<form method="post" class="form-horizontal" action="ações/#">
	 		<div class="form-group ">
				<label for="id_predio" class="col-sm-2 control-label">Id do prédio</label>
					<div class="form-group col-md-4" align="left">
						<select name="id_predio" id="id_predio" class="form-control" >
								<?php
									$sql2 = "SELECT * FROM edificios";
									$consulta = $conexao->prepare($sql2);
									$consulta->execute();
									$consulta->setFetchMode(PDO::FETCH_OBJ);
									while($result2 = $consulta->fetch()){
											if($result2->idedificio == $result->ap_idedificio){?>
												<option value="<?php echo $result2->idedificio;?>" selected><?php echo $result->idedificio;?></option>
											<?php }else{ ?>	
											<option value="<?php echo $result2->idedificio;?>"><?php echo $result->idedificio;?></option>
									<?php }
								}?>
						</select>
					</div>
			</div>
			<div class="form-group">
				<label for="novo_numeroAp" class="col-sm-2 control-label">Numero do apartamento</label>
					<div class="col-sm-10">
						<input type="number" min="0" name="novo_numeroAp" value="<?php echo $result->ap_numeroap; ?>" id="novo_numeroAp" class="form-control">	
					</div>
			</div>
			<div class="form-group">
				<label for="novo_quartos" class="col-sm-2 control-label">Quantidade de quartos</label>
					<div class="col-sm-10">
						<input type="number" min="0" name="novo_quartos" value="<?php echo $result->ap_quartos; ?>" id="novo_quartos" class="form-control">	
					</div>
			</div>
			<div class="modal-footer">
				<div class="form-group" align="left">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar</button>
						<button type="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpar</button>
				    </div>
				</div>
			</div>
	 	</form>
			
				
		
<?php }
	}catch(PDOException $e){
		echo 'ERROR: '. $e->getMessage();
		echo "<br><br><a href=\"../apartamento.php\">Voltar</a>";
	}

}
?>