<?include 'Sessao.php';
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
    <form>
	<h1>Localizar Pagamento</h1>
   <figure>
	<br><br>
	<form method="post" >
    <label><i>CPF:    </i></label><br><br><input type="text" id="cpf"><br><br>  
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
    </form>	              

</body>



 <footer>
 
 </footer>
</html>
<?}?>