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
	<img src="Imagens/topo.jpg"></p>
	</figure>  
</head>
<!-- Final da cabeça do site -->
<body>
<form id="formContato" name="formContato" method="post" action="cadastroproblemasbd.php" >
    <label for="natureza">Problema:</label><br><br>
    <select name="natureza" id="Idproblema">
    <option>Água </option>
    <option>Elétrico</option>
    <option>Serviços Gerais</option>
    </select>
    <br><br> <label for="descricaoproblema"> CPF</label><br><input type="text" name="cpf"><br><br>
    <label for="descricaoproblema">Descrição do Problema:</label><br>
    <textarea name="descricaoproblema" id="Iddescricaoproblema" cols=35 rows=3>
    
    </textarea>
    <br><br>



    <input type="submit" value="Confirmar" id="idconfirmar" name="confirmar">
    <input type="reset" value="Cancelar" id="idcancelar" name="cancelar">
    </form>	              


</body>
 <footer>
 <h1>Desenvolvido por Luiz Henrique , Genesês Lopes e Reinaldo Bispo<h1>
 </footer>
</html>
