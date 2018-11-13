<?php include '../../Sessao.php';
include '../../conexao.php';
	$idpredio = $_POST["locPredio"];
	
	//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
	 	$conexao = administrador();
	 else if (validaUsuario() ==2 )
	 	$conexao = locatario();
	 else 
	 	$conexao = funcionario();

	 $sql = "SELECT * FROM consulta_edificio(?)";
	 $consulta = $conexao->prepare($sql);
	 $consulta->bindValue(1,$idpredio);
	 $consulta->execute();
	 $consulta->setFetchMode(PDO::FETCH_OBJ);
	 while($result = $consulta->fetch()){
?>

<form method="post" class="form-horizontal" name="cadastroPredio" action="ações/atualizapredioOn.php">
	<input type="hidden" name="idpredio" value="<?php echo $idpredio; ?>">
	<div class="form-group">
		<label for="nome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10" align="left">
				<input type="text" name="nome" value="<?php echo $result->ed_nome; ?>" id="nome" class="form-control">	
			</div>
	</div>
	<div class="form-group">
		<label for="bairro" class="col-sm-2 control-label">Bairro</label>
			<div class="col-sm-10" align="left">
				<input type="text" name="bairro" value="<?php echo $result->ed_bairro; ?>" id="bairro" class="form-control">	
			</div>
	</div>
	<div class="form-group">
		<label for="numero" class="col-sm-2 control-label">Numero</label>
			<div class="col-sm-10" align="left">
				<input type="number" name="numero" value="<?php echo $result->ed_numero; ?>" id="numero" class="form-control">	
			</div>
	</div>
	<div class="form-group">
		<label for="rua" class="col-sm-2 control-label">Rua</label>
			<div class="col-sm-10" align="left">
				<input type="text" name="rua" value="<?php echo $result->ed_rua; ?>" id="rua" class="form-control">	
			</div>
	</div>
	<div class="form-group">
		<label for="cep" class="col-sm-2 control-label">Cep</label>
			<div class="col-sm-10" align="left">
				<input type="text" name="cep" value="<?php echo $result->ed_cep; ?>" id="cep" class="form-control">	
			</div>
	</div>
	<?php }?>
	<div class="modal-footer">
		<div class="form-group" align="left">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar</button>
				<button type="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpar</button>
			</div>
		</div>
	</div>
</form>