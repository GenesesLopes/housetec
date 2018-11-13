<?php include 'Sessao.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else{
?>
<!DOCTYPE html>
<!-- Site desenvolvido por Luiz Henrique,Gêneses Lopes e Reinaldo Bispo -->
<html>

<head>
    <meta charset="utf-8" />
    <title> HOUSETEC</title>
    <link type="text/css" rel="stylesheet" href="css.css" />
	<link rel="shortcut icon" href="Imagens/favicon.ico" />
	<figure>
	<p class="imagemtopo">
	<a href="pagamento.php">
	<img src="Imagens/topo.jpg"></p></a>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>

<form method="post" action="adpagamento.php">
<h1>Cadastrar Pagamento</h1>
<br><br>
<label><i>CPF do Locatário:    </i></label><br><br><input type="text" name="cpf" id="cpf"><br><br> 
<label><i>Data de Pagamento</i></label><br><br>       <input type="date" name="datapag" id="datadepagamento"><br><br>  
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
</form>  

</body>



 <footer>
 
 </footer>
</html>
<?php }?>