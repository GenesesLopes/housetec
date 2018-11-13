<?php 
include 'conexao.php';
include 'Sessao.php';
include 'head.php';
if(!isset($_SESSION["logado"]))
    header("location: ../index.php");
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


<div class="imgefeito" align="center"><!--Cadastrar locatários-->
<a data-toggle="modal" data-target="#locatario" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../../Imagens/mais.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Cadastrar</strong>
		</span>
</a>
<!--Inicio de modal-->
	<div class="modal fade" id="locatario" tabindex="-1" role="dialog" aria-labelledby="locatarioLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cadastro de Locatario</h4>
				</div>
				<form method="post" class="form-horizontal" name="cadastroPredio" action="ações/locatariocadastrarOn.php">
					<div class="modal-body">
						<div class="form-group">
							<label for="nome" class="col-sm-2 control-label">Nome completo</label>
							<div class="col-sm-10">
								<input type="text" name="nome" id="nome" class="form-control">	
							</div>
						</div>
						<div class="form-group">
							<label for="nasc" class="col-sm-2 control-label">Data de Nascimento</label>
							<div class="col-sm-10">
								<input type="date" name="nasc" id="nasc" class="form-control">	
							</div>
						</div>
						<div class="form-group ">
							<label for="estado" class="col-sm-2 control-label">Estado</label>
								<div class="col-sm-10">
									<input type="text" name="estado" id="estado" class="form-control">	
								</div>
						</div>
						<div class="form-group ">
							<label for="cidade" class="col-sm-2 control-label">Cidade</label>
								<div class="col-sm-10">
									<input type="text" name="cidade" id="cidade" class="form-control">	
								</div>
						</div>
						
						<div class="form-group">
							<label for="rg" class="col-sm-2 control-label">Rg</label>
							<div class="col-sm-10">
								<input type="text" name="rg" id="rg" class="form-control">	
							</div>
						</div>
						<div class="form-group">
							<label for="cpf" class="col-sm-2 control-label">Cpf</label>
							<div class="col-sm-10">
								<input type="text" name="cpf" id="cpf" class="form-control">	
							</div>
						</div>
						<div class="form-group">
							<label for="telefone" class="col-sm-2 control-label">Telefone Residencial</label>
							<div class="col-sm-10">
								<input id="telefone" name="telefone" class="form-control" maxlength="10" type="tel">
							</div>
						</div>
						<div class="form-group">
							<label for="celular" class="col-sm-2 control-label">Telefone Celular</label>
							<div class="col-sm-10">
								<input id="celular" name="celular" class="form-control" maxlength="10" type="tel">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Situação</label>
							<div class="form-group col-md-4" align="left">
								<select nome="status" id="status" required class="form-control">
									<option value="1" selected>Ativo</option>
									<option value="0">Inativo</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sitPagamento" class="col-sm-2 control-label">Pagamento</label>
							<div class="form-group col-md-4" align="left">
								<select nome="sitPagamento" id="sitPagamento" required class="form-control">
									<option value="1">Pago</option>
									<option value="0" selected>Em aberto</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pagamento" class="col-sm-2 control-label">Data de Pagamento</label>
							<div class="col-sm-10">
								<input type="date" name="pagamento" id="pagamento" class="form-control">	
							</div>
						</div>
						<div class="form-group ">
							<label for="idpredio" class="col-sm-2 control-label">Id do prédio</label>
								<div class="form-group col-md-4" align="left">
									<select nome="idpredio" id="idpredio" required class="form-control" onchange="buscaApartamentoLivre();">
										<option>Escolha um edificio</option>
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
						<div class="form-group" id="resultApartamento">
							
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
<div class="imgefeito" align="center"><!--Buscar Locatário-->	
<a data-toggle="modal" data-target="#locatarioBuscar" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../Imagens/lupa.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Buscar</strong>
		</span>
</a>
<!--Inicio de modal-->
	<div class="modal fade" id="locatarioBuscar" tabindex="-1" role="dialog" aria-labelledby="locatorioBuscarLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Buscar Locatório</h4>
				</div>
					<div class="modal-body">
						<div class="form-group ">
							<label for="cpf" class="col-sm-2 control-label">CPF do Locatário</label>
								<div class="form-group col-md-8" align="left">
									<select nome="cpf" id="cpf" required class="form-control" onchange="buscaLocatario();">
										<option>Chamar Procedmento no banco</option>
										<option>Chamar Procedmento no banco2</option>
									</select>
								</div><br>
								<div class="form-group" align="center" id="resultLocalario">
									
								</div>
						</div>	
					</div>
			</div>
	</div>
</div><!--Fim de modal-->
<div class="imgefeito" align="center"><!--Atualizar dados do locatário-->
<a data-toggle="modal" data-target="#locatarioAtualizar" data-toggle="modal" data-target=".bs-example-modal-lg">
	<img src="../Imagens/refresh.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Atualizar</strong>
		</span>
</a>
<!--Inicio de modal-->
	<div class="modal fade" id="locatarioAtualizar" tabindex="-1" role="dialog" aria-labelledby="locatarioAtualizarLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Atualizar Locatório</h4>
				</div>
				<form method="post" name="atualizaLocatario" action="ações/atualizardadousuario.php">
					<div class="modal-body">
						<div class="form-group ">
							<label for="cpf2" class="col-sm-2 control-label">CPF do Locatário</label>
								<div class="form-group col-md-8" align="left">
									<select nome="cpf" id="cpf2" required class="form-control" onchange="buscaLocatario2();">
										<option>Chamar Procedmento no banco</option>
										<option>Chamar Procedmento no banco2</option>
									</select>
								</div><br>
								<div class="form-group" id="resultLocalario2">
									
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
</body>
<?php
include 'footer.php'; ?>
</html>
<?php }?>