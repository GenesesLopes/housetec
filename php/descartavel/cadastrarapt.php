<?include 'Sessao.php';
include 'conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else if(!isset($_SESSION["administrador"])){
    echo"<script>alert('Não possui privilégios suficiente para acessar a página!');location.href=\"paginaPrincipal.php\";</script>";
}else{
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
    <a href="apartamento.php">
	<img src="Imagens/topo.jpg"></p></a>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>

	<form method="post" action="cadastraraptOn.php" >
    <br><br>
    <h1>Cadastrar Apartamento</h1>
    <label><i>ID do Prédio:    </i></label><br><br>
    <select name="locPredio" required>  
            <option>
                <!--Localizar id do predio pelo cpf do proprietario-->
                <?$sql = "SELECT idedificio FROM edificio WHERE cpfadm = ?";
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
    <label>Número do Apartamento</label><br><br>                      <input type="text" id="name" size="30" name="napt" maxlength="30"><br><br>
    <label>Quantidade de Quartos</label><br><br>       <input type="number" id="datadenascimento" name="quartos"><br><br>
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset"  value="Cancelar" id="idcancelar" name="cancelar">

    </form>	              

</body>
</html>
<?}?>