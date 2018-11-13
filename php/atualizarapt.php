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
	<a href="apartamento.php">
	<img src="Imagens/topo.jpg"></p></a>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>
<h1>Atualizar Apartamento</h1>
	<br><br>
	<form method="post" >
    <label>Número do Apartamento</label><br><br><input type="text" id="name" size="30" maxlength="30"><br><br>
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset"  value="Cancelar" id="idcancelar" name="cancelar">
    </form>

</body>
<footer>
<h1>Desenvolvido por Luiz Henrique , Gêneses Lopes e Reinaldo Bispo<h1>
</footer>
</html>
<?}?>