<?php 
include 'conexao.php';
include 'head.php';
include 'Sessao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../index.php");
else{
?>
<body>
<div class="imgefeito" align="center">

<div class="imgefeito" align="center">
<a href="predio.php">
	<img src="../Imagens/predio.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Prédio</strong>
		</span>
</a>

<div class="imgefeito" align="center">
<a href="apartamento.php">
	<img src="../Imagens/apartamento.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Apartamento</strong>
		</span>
</a>

<div class="imgefeito" align="center">
<a href="locatario.php">
	<img src="../Imagens/cabeça.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Usuário</strong>
		</span>
</a>
<div class="imgefeito" align="center">
<a href="pagamento.php">
	<img src="../Imagens/sifra.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Pagamento</strong>
		</span>
</a><br><br>
<a href="problema.php">
	<img src="../Imagens/problemas.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Problemas</strong>
		</span>
</a>
<!--Criar o botão Aqui-->
<div class="imgefeito" align="center">
<a href="sairSessao.php">
	<img src="../Imagens/sair.jpg" alt="Exemplo de legenda com CSS" />

	<span class="desc">
		<strong>Sair</strong>
		</span>
</a>
</body>
<?php 
	include 'footer.php';
}?>
