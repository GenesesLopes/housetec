<?php include 'Sessao.php';
include 'head.php';
include 'conexao.php';
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

<div class="imgefeito" align="center"><!--Cadastrar apartamento-->
<a data-toggle="modal" data-target="#Apartamento" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../Imagens/mais.jpg" alt="Exemplo de legenda com CSS" />
	<span class="desc">
		<strong>Cadastrar</strong>
		</span>
</a>
<!--Inicio de modal-->
	<div class="modal fade" id="Apartamento" tabindex="-1" role="dialog" aria-labelledby="ApartamentoLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cadastro de Apartamentos</h4>
				</div>
				<form method="post" class="form-horizontal" action="ações/cadastroAp.php">
					<div class="modal-body">
						<div class="form-group ">
							<label for="idpredio" class="col-sm-2 control-label">Id do prédio</label>
								<div class="form-group col-md-4" align="left">
									<select name="idpredio" id="idpredio" class="form-control" >
										<option selected disabled>escolha um valor</option>
										<?php
											$sql = "SELECT * FROM edificios";
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
						<div class="form-group">
							<label for="numeroAp" class="col-sm-2 control-label">Numero do apartamento</label>
							<div class="col-sm-10">
								<input type="number" min="0" name="numeroAp" id="numeroAp" class="form-control">	
							</div>
						</div>
						<div class="form-group">
							<label for="quartos" class="col-sm-2 control-label">Quantidade de quartos</label>
							<div class="col-sm-10">
								<input type="number" min="0" name="quartos" id="quartos" class="form-control">	
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
<div class="imgefeito" align="center"><!--Buscar Apartamento-->
<a data-toggle="modal" data-target="#LocalizaApartamento" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../Imagens/lupa.jpg" alt="Exemplo de legenda com CSS" />
	<span class="desc">
		<strong>Buscar</strong>
		</span>
</a>
	<!--Inicio de modal-->
	<div class="modal fade" id="LocalizaApartamento" tabindex="-1" role="dialog" aria-labelledby="LocalizaApartamentoLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Localizar Apartamento</h4>
					</div>
					<div class="modal-body">
						<div class="form-group ">
							<label for="idap" class="col-sm-2 control-label">Id do Apartamento</label>	
							<div class="col-sm-10">
								<input type="text" name="idap" id="idap" class="form-control" onblur="buscaIdApartamento();">	
							</div>
						</div><br>
						<div class="form-group" id="tabelaApartamento" align="center"><!--Colocar resultado da tabela aqui aqui-->

						</div>
					</div>
				</div>
			</div>
	</div><!--Fim de modal-->
</div>

<div class="imgefeito" align="center"><!--Atualizar dados do apartamento-->
<a data-toggle="modal" data-target="#AtualizaApartamento" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../Imagens/refresh.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Atualizar</strong>
		</span>
</a>
	<!--Inicio de modal-->
	<div class="modal fade" id="AtualizaApartamento" tabindex="-1" role="dialog" aria-labelledby="AtualizaApartamentoLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Atualiza dados do apartamento</h4>
					</div>
					<div class="modal-body">
						<div class="form-group ">
							<label for="locPredio" class="col-sm-2 control-label">Id do prédio</label>
								<div class="form-group col-md-4" align="left">
									<select nome="locPredio" id="locPredio" required class="form-control" onchange="atualizarApartamento();">
										<option selected disabled>escolha um valor</option>
										<?php
											$sql = "SELECT * FROM apartamentos";
											$consulta = $conexao->prepare($sql);
											$consulta->execute();
											$consulta->setFetchMode(PDO::FETCH_OBJ);
											while($result = $consulta->fetch()){
										?>
										<option value="<?php echo $result->idapartamento;?>"><?php echo $result->iapartamento;?></option>
										<?php }?>
									</select>
								</div><br>
						</div>
						<!--Colocar resultado da tabela aqui aqui-->
						<div class="form-group" id="formAtualizaAp">

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
 } ?>