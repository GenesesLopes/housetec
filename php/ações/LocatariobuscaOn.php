<?php include '../../Sessao.php';
include '../../conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
    $cpf = $_POST['cpf'];
    /*$sql = "SELECT * FROM locatario WHERE cpf = ? AND cpfadm = ? ";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1,$cpf);
        $consulta->bindValue(2,$cpfadm);
        $consulta->execute();*/
    ?>
    <table class="table table-condensed">
        <tr><td>Id</td><td>Nome</td><td>Numero</td><td>Rua</td><td>Cep</td><td>Bairro</td></tr>
        <tr><td><?php echo $idPredio ?></td><td><?php echo $idPredio ?></td><td><?php echo $idPredio ?></td><td><?php echo $idPredio ?></td><td><?php echo $idPredio ?></td><td><?php echo $idPredio ?></td></tr>
</table>
<?php }?>