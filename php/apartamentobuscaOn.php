<?include 'Sessao.php';
include 'conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else if(!isset($_SESSION["administrador"])){
    echo"<script>alert('Não possui privilégios suficiente para acessar a página!');location.href=\"paginaPrincipal.php\";</script>";
}else{
$predio = $_POST["locPredio"];
$ap = $_POST["idap"];
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
    <a href="apartamentobusca.php">
    <img src="Imagens/topo.jpg"></p></a>
    </figure>  
</head>
<!-- Final da cabeça do site -->
<body><?
        $sql = "SELECT * FROM apartamento WHERE idedificio = ? AND idapartamento = ?";
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(1,$predio);
            $consulta->bindValue(2,$ap);
            $consulta->execute();
            if($consulta->rowCount()){

        ?>
    <table border="1">
        <tr><td>Id</td><td>Numero</td><td>Quartos</td><td>Edificio</td></tr>
        <?$consulta->setFetchMode(PDO::FETCH_OBJ);
            while($result = $consulta->fetch()){
        ?>
        <tr><td><?echo $result->idapartamento;?></td><td><?echo $result->numeroap;?></td><td><?echo $result->quartos;?></td><td><?echo $result->idedificio;?></td></tr>
        <?}?>
    </table>
    <?}else
        echo"<script>alert('Apartamento Não encontrado!');location.href=\"apartamentobusca.php\";</script>"?>
</body>

 <footer>
 
 </footer>
</html>
<?}?>