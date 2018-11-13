<?php include '../../Sessao.php';
include '../../conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
    /*$cpf = $_POST['cpf'];
    $sql = "SELECT * FROM locatario WHERE cpf = ? AND cpfadm = ? ";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1,$cpf);
        $consulta->bindValue(2,$cpfadm);
        $consulta->execute();*/
    ?>
    <table class="table table-condensed">
        <tr><td>Nome</td><td>CPF</td><td>RG</td><td>Data de Nascimento</td><td>Apartamento Alugado</td><td>Status</td></tr>
               
    </table>
<?php }?>