<?php include '../../Sessao.php';
include '../../conexao.php';
if(!isset($_SESSION["logado"]))
    header("location: ../../../index.php");
else{
$cpf = $_POST["cpf"];
/*
$sql ="SELECT * FROM locatario WHERE cpf = ? ";
$consulta = $conexao->prepare($sql);
$consulta->bindValue(1,$cpf);
$consulta->execute();
$consulta->setFetchMode(PDO::FETCH_OBJ);
	while($result = $consulta->fetch()){
	   $rg = $result->rg;
	   $nome = $result->nome;
	   $dataNasc = $result->nascimento;
	   $status = $result->status;
	   $cpfadm = $result->cpfadm;
	}
    */
?>
<div class="form-group col-md-6" >
    <label for="cpf2" class="col-sm-2 control-label">CPF</label>
    <div class="col-sm-10">
          <input type="text" id="cpf2" class="form-control" name="cpf2" value="<?echo $cpf;?>" maxlength="11">
    </div>
</div>
<div class="form-group col-md-6" >
    <label for="rg" class="col-sm-2 control-label">Rg</label>
    <div class="col-sm-10">
          <input type="text" id="rg2" class="form-control" name="rg2" value="<?echo $rg;?>" >
    </div>
</div>    
<div class="form-group col-md-6" >
    <label for="nome2" class="col-sm-2 control-label">Nome </label>
    <div class="col-sm-10">
          <input type="text" id="nome2" class="form-control" name="nome2" value="<?echo $nome;?>">
    </div>
</div>

<div class="form-group col-md-6" >
    <label for="nasc2" class="col-sm-2 control-label">Data de nascimento</label>
    <div class="col-sm-10">
          <input type="date" id="nasc2" class="form-control" name="nasc2" value="<?echo $nascimento;?>">
    </div>
</div>
    <div class="form-group col-md-7" align="left">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
             <select nome="status" id="status" required class="form-control">
                <option>Ativo</option>
                <option>Inativo</option>
             </select>
        </div>
    </div>
    <div class="form-group col-md-7" align="left">
        <label for="locador" class="col-sm-2 control-label">Locador</label>
        <div class="col-sm-10">
              <input type="text" id="locador" class="form-control" name="locador" value="<?echo $cpfadm;?>">
        </div>
    </div>	
    
<?php 
} ?>

