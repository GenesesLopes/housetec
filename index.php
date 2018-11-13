<?php include 'php/Sessao.php';
if(isset($_SESSION["logado"]))
    header("location: php/paginaPrincipal.php");
else{
?>
<!DOCTYPE html>
<!-- Site desenvolvido por Luiz Henrique,Gêneses Lopes e Reinaldo Bispo -->
<html>

<head>
    <meta charset="utf-8" />
    <title> HOUSETEC</title>
    <link type="text/css" rel="stylesheet" href="css/css.css" />
	<link rel="shortcut icon" href="Imagens/favicon.ico" />
	<figure>
	<p class="imagemtopo">
	<img src="Imagens/titulo.jpg"></p>
	</figure>  

</head>
<!-- Final da cabeça do site -->
<body >
 
    <form id="formContato" name="formContato" method="post" action="php/validaLogin.php" >
    <input type="text" name="cpf" id="cpfform" placeholder="                                                   CPF           "><br><br>
     
    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
    <input type="submit" value="Administrador" id="cadastraradm" name="cadastrar" formaction="php/loginadm.php">
    </form>	              



</div>
</body>


<footer>
<h1>Desenvolvido por Luiz Henrique , Gêneses Lopes e Reinaldo Bispo<h1>
</footer>
</html>
<?php }?>