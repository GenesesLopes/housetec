<?php include 'Sessao.php';
include 'conexao.php';
include 'head.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else{
	//chamando a validação do usuario no banco
	 if(validaUsuario() == 1)
		$conexao = administrador();
	else if (validaUsuario() ==2 )
		$conexao = locatario();
	else 
		$conexao = funcionario();
?>
	<body>
	<div class="imgefeito" align="center"><!--Cadastrar predio-->
	<a data-toggle="modal" data-target="#Predio" data-toggle="modal" data-target=".bs-example-modal-lg">
		<img src="../Imagens/mais.jpg" alt="Exemplo de legenda com CSS" />
		<span class="desc">
			<strong>Cadastrar</strong>
			</span>
	</a>
	<!--Inicio de modal-->
		<div class="modal fade" id="Predio" tabindex="-1" role="dialog" aria-labelledby="PredioLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Cadastro de Predios</h4>
					</div>
					<form method="post" class="form-horizontal" name="cadastroPredio" action="ações/cadastropredio.php">
						<div class="modal-body">
							<div class="form-group">
								<label for="nome" class="col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" name="nome" id="nome" class="form-control">	
								</div>
							</div>
							<div class="form-group">
								<label for="bairro" class="col-sm-2 control-label">Bairro</label>
								<div class="col-sm-10">
									<input type="text" name="bairro" id="bairro" class="form-control">	
								</div>
							</div>
							<div class="form-group">
								<label for="cep" class="col-sm-2 control-label">Cep</label>
								<div class="col-sm-10">
									<input type="text" name="cep" id="cep" class="form-control">	
								</div>
							</div>
							<div class="form-group">
								<label for="numero" class="col-sm-2 control-label">Número</label>
								<div class="col-sm-10">
									<input type="text" name="numero" id="numero" class="form-control">	
								</div>
							</div>
							<div class="form-group">
								<label for="rua" class="col-sm-2 control-label">Rua</label>
								<div class="col-sm-10">
									<input type="text" name="rua" id="rua" class="form-control">	
								</div>
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
				</div>
			</div>
		</div><!--Fim de modal-->
	</div>
	<br><br>
	<div class="imgefeito" align="center"><!--Buscar predio-->
	<a data-toggle="modal" data-target="#LocalizaPredio" data-toggle="modal" data-target=".bs-example-modal-lg">
		<img src="../Imagens/lupa.jpg" alt="Exemplo de legenda com CSS" />
		<span class="desc">
			<strong>Buscar</strong>
			</span>
	</a>
		<!--Inicio de modal-->
		<div class="modal fade" id="LocalizaPredio" tabindex="-1" role="dialog" aria-labelledby="LocalizaPredioLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Localizar Predio</h4>
						</div>
						<div class="modal-body">
							<div class="form-group ">
								<label for="locPredio" class="col-sm-2 control-label">Id do prédio</label>
									<div class="form-group col-md-4" align="left">
										<select nome="locPredio" id="locPredio" required class="form-control" onchange="buscaPredioTabela();">
											<option value="0"></option>
											<?php 
												$sql = "SELECT * from edificios";
												$consulta = $conexao->prepare($sql);
												$consulta->execute();
												$consulta->setFetchMode(PDO::FETCH_OBJ);
												while($result = $consulta->fetch()){
												?>
												<option value="<?php echo $result->idedificio;?>"><?php echo $result->idedificio;?></option>
											<?php }?>
										</select>
									</div><br>
							</div>
							<!--Colocar resultado da tabela aqui aqui-->
							<div class="form-group" id="tabelaBusca">

							</div><br>

							<br>
						</div>
					</div>
				</div>
		</div><!--Fim de modal-->
	</div>
	<br><br>

	<div class="imgefeito" align="center"><!--Atualizar dados do prédio-->
		<a data-toggle="modal" data-target="#AtualizaPredio" data-toggle="modal" data-target=".bs-example-modal-lg">
			<img src="../Imagens/refresh.jpg" alt="Exemplo de legenda com CSS" />

			<span class="desc">
				<strong>Atualizar</strong>
				</span>
		</a>

		<!--Inicio de modal-->
		<div class="modal fade" id="AtualizaPredio" tabindex="-1" role="dialog" aria-labelledby="AtualizaPredioLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Atualiza dados do prédio</h4>
						</div>
						<div class="modal-body">
							<div class="form-group ">
								<label for="locPredio" class="col-sm-2 control-label">Id do prédio</label>
									<div class="form-group col-md-4" align="left">
										<select nome="locPredio2" id="locPredio2" required class="form-control" onchange="atualizarPredio();">
										<option value="0"></option>
											<?php 
												$sql = "SELECT * from edificios";
												$consulta = $conexao->prepare($sql);
												$consulta->execute();
												$consulta->setFetchMode(PDO::FETCH_OBJ);
												while($result = $consulta->fetch()){
												?>
												<option value="<?php echo $result->idedificio;?>"><?php echo $result->idedificio;?></option>
											<?php }?>
										</select>
									</div><br>
							</div>
							<!--Colocar resultado da tabela aqui aqui-->
							<div class="form-group" id="dadosPredio">

							</div>
							<br>
						</div>
					</div>
				</div>
		</div><!--Fim de modal-->
	</div>
</body>
<?php
include 'footer.php';
}

?>
