<?php include 'Sessao.php';
if(isset($_SESSION["logado"]))
    header("location: paginaPrincipal.php");
else{
?>
<!DOCTYPE html>
<!-- Site desenvolvido por Luiz Henrique,Gêneses Lopes e Reinaldo Bispo -->
<html>

<head>
    <meta charset="utf-8" />
    <title> HOUSETEC</title>
    <link type="text/css" rel="stylesheet" href="../css/css.css" />
	<link rel="shortcut icon" href="../Imagens/favicon.ico" />
	<figure>
	<p class="imagemtopo">
	<img src="../Imagens/tituloadm.jpg"></p>
	</figure>  

</head>
<!-- Final da cabeça do site -->
<body>
  
    <form id="formContato" name="formContato" method="post" action="validaLogin.php" >
    <input type="text" name="cpfadm" id="cpfform" placeholder="                                                     CPF           "><br><br>
    <input type="password" name="senhaform" id="senhaform" placeholder="                                                  SENHA          "><br><br>
    
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
    <input type="submit" value="Voltar" id="voltarlogin" name="voltar" formaction="../index.php">
    </form>	              


</div>
</body>


<footer>
<h1>Desenvolvido por Luiz Henrique , Gêneses Lopes e Reinaldo Bispo<h1>
</footer>
</html>
<?php }?>
