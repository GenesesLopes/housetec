<?include 'Sessao.php';
include 'conexao.php';

if(isset($_SESSION["administrador"])){
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $status = $_POST["status"];
    $cpfadmin = $_POST["locador"];

    echo $cpf.$rg.$nome.$data.$status.$cpfadmin;

    //comando sql para atualizar dados pelo administrador
    $sql = "UPDATE locatario SET cpf = ?, rg = ?, nome = ?, status = ?, cpfadmin = ?, nascimento = ? WHERE cpf = ?";
    $atualiza = $conexao->prepare($sql);
    $atualiza->bindValue(1,$cpf);
    $atualiza->bindValue(2,$rg);
    $atualiza->bindValue(3,$nome);
    $atualiza->bindValue(4,$data);
    $atualiza->bindValue(5,$status);
    $atualiza->bindValue(6,$cpfadmin);
    $atualiza->bindValue(7,$cpf);
    $atualiza->execute();
    echo "<script>alert('Dados do Usuario $nome Atualizados!');location.href=\"paginaPrincipal.php\";</script>";
}else{
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $nome = $_POST["nome"];
    $data = $_POST["data"];
    $sql = "UPDATE locatario SET cpf = ?, rg = ?, nome = ?, nascimento = ? WHERE cpf = ?";
    $atualiza = $conexao->prepare($sql);
    $atualiza->bindValue(1,$cpf);
    $atualiza->bindValue(2,$rg);
    $atualiza->bindValue(3,$nome);
    $atualiza->bindValue(4,$dataNasc);
    $atualiza->bindValue(5,$cpf);
    $atualiza->execute();
    echo "<script>alert('Dados do Usuario $nome Atualizados!');location.href=\"paginaPrincipal.php\";</script>";

}


?>