<?include 'Sessao.php';
include 'conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else{
 $cpf = $_SESSION["cpf"];
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
	<a href="predio.php">
	<img src="Imagens/topo.jpg"></p></a>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>

	<form method="post" action="prediolocalizarOn.php" >
	<h1>Localizar Prédio</h1><br><br>
    <label><i>ID do Prédio:    </i></label><br><br>
    <select name="locPredio" required>	
			<option>
				<!--Localizar id do predio pelo cpf do proprietario-->
				<?$sql = "SELECT idedificio FROM edificio WHERE cpfadm = ? OR cpfadm = (SELECT cpfadm FROM locatario) ";
	    		$consulta = $conexao->prepare($sql);
	    		$consulta->bindValue(1,$cpf);
	    		$consulta->execute();
	    		$consulta->setFetchMode(PDO::FETCH_OBJ);
	    		while($result = $consulta->fetch()){
	        		echo"<option>".$result->idedificio."</option>";
	    		}
	    		?>
			</option>
		</select><br><br> 
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
    </form>	              

</body>



 <footer>
 
 </footer>
</html>
<?}?>