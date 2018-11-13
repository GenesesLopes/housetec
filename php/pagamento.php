<?php include 'Sessao.php';
include 'head.php';
if(!isset($_SESSION["logado"]))
    header("location: ../index.php");
else{
?>

<body>
<div class="imgefeito" align="center">
<a href="cadastrarpagamento.php">
	<img src="../Imagens/mais.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Relizar pagamento</strong>
		</span>
</a>
<br><br>
<div class="imgefeito" align="center">
<a href="pagamentobusca.php">
	<img src="../Imagens/lupa.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Buscar</strong>
		</span>
</a>
</body>
<?php
	include 'footer.php';
 }?>