<?
include 'conexao.php';

$problema = $_POST["natureza"];
$descricao = $_POST["descricaoproblema"];
$cpf= $_POST["cpf"];

$sql = "INSERT INTO problema VALUES (default,?,?,?) ";
$inserir = $conexao->prepare($sql);
$inserir->bindValue(1,$problema);
$inserir->bindValue(2,$descricao);
$inserir->bindValue(3,$cpf);
$inserir->execute();


echo"<script>alert('Dados inseridos!');location.href=\"paginaPrincipal.php\";</script>"

?>
