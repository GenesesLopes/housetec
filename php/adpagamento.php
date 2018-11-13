<?include 'Sessao.php';
include 'conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: index.php");
else{

		$cpf = $_POST["cpf"];
		$datapag = $_POST["datadepagamento"];

	$sql= "UPDATE aluga SET pagamento = ? WHERE fkcpf = ?";
	$inserir = $conexao->prepare($sql);
	$inserir->bindValue(1,$datapag);
	$inserir->bindValue(2,$dcpf);
	echo"<script>alert('Dados inseridos!'); location.href=\"paginaPrincipal.php\";</script>";
}
?>