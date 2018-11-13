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
    <a href="locatario.php">
	<img src="Imagens/topo.jpg"></p></a>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>
	<form method="post" action="locatariocadastrarOn.php">
    <h1>Cadastrar Locatário</h1>
    <br><br>
    <label>Nome Completo</label><br><br>            <input type="text" name="nome" id="name" size="30" maxlength="30"><br><br>
    <label>Data de Nascimento</label><br><br>       <input type="date" name="dataNasc" id="datadenascimento"><br><br>
    <label>Cidade</label><br><br>                   <input type="text" name="cidade" id="cidade" size="30" maxlength="30"><br><br>
    <label>RG</label><br><br>                       <input type="text" name="rg" id="rg" size="10" maxlength="10"><br><br>
    <label>CPF</label><br><br>                      <input type="text" name="cpf" id="cpf" size="11" maxlength="11"><br><br>
    <label>Telefone Residencial </label><br><br>                <input id="telefone" name="telefone" type="tel" pattern="^\d{10}$" ><br><br>
    <label>Telefone Celular </label><br><br>                    <input id="telefone1" name="celular" type="tel" pattern="^\d{11}$" ><br><br>
    <label>Data de Vencimento</label><br><br>          <input type="date" name="dataVenc" id="name" size="30" maxlength="30"><br><br>
    <label>ID do Prédio</label>
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
    <label>ID do Apartamento</label><br><br>            <input type="text" name="numeroap" id="name" size="30" maxlength="30"><br><br>  
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">

    </form>	              

</body>



 <footer>
 
 </footer>
</html>
<?}?>