<?php include '../Sessao.php';
include '../conexao.php';

if(!isset($_SESSION["logado"]))
    header("location: ../../index.php");
else{
    //chamando a validação do usuario no banco
     if(validaUsuario() == 1)
        $conexao = administrador();
    else if (validaUsuario() ==2 )
        $conexao = locatario();
    else 
        $conexao = funcionario();
        //recuperando dados do formulário
        $cpfadm = $_SESSION["cpf"];
        $nome = $_POST["nome"];
        $dataNasc = $_POST["nasc"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $telefoneF = $_POST["telefone"];
        $telefoneC = $_POST["celular"];
        $dataPagamento = $_POST["pagamento"];
        $predio = $_POST["add_idpredio"];
        $numeroAp = $_POST["idapartamento_cadastro"];
        $situacao = $_POST["status"];
        $pagamento = $_POST["sitPagamento"];

        echo "Nome: ".$nome."<br>Nascimento: ".$dataNasc."<br>Data Pagamento: ".$dataPagamento."<br>Cidade: ".$cidade."<br>Estado: ".$estado."<br>Rg: ".$rg."<br>CPF: ".$cpf."<br>TelefoneC: ".$telefoneC."<br>Fixo: ".$telefoneF."<br>Predio: ".$predio."<br>Apartamento: ".$numeroAp."<br>Situacao: ".$situacao."<br>Pagamento".$pagamento;

        
        /*
        //consultando se o usuário já é cadastrado
        $sql = "SELECT * FROM locatario WHERE  cpf = ?";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1,$cpf);
        $consulta->execute();
        if($consulta->rowCount())
            echo "<script>alert('usuário já cadastrado!');location.href=\"locatariocadastrar.php\";</script>";
        
        $sql = "SELECT * FROM aluga WHERE  fkapartamento = ?";
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1,$numero);
        $consulta->execute();
        
        if($consulta->rowCount())
            echo "<script>alert('Apartamento Já ocupado');location.href=\"locatariocadastrar.php\";</script>";
        
        else{
            //inserir dados no banco
            $sql = "INSERT INTO locatario VALUES(?,?,?,?,?,?,?,?)";
            $inserir = $conexao->prepare($sql);
            $inserir->bindValue(1,$cpf);
            $inserir->bindValue(2,$rg);
            $inserir->bindValue(3,$nome);
            $inserir->bindValue(4,$dataNasc);
            $inserir->bindValue(5,'Ativo');
            $inserir->bindValue(6,$cpfadm);
            $inserir->bindValue(7,$predio);
            $inserir->bindValue(8,$numero);
            $inserir->execute();

            //inserindo dados na tabela telefone
            $sql="INSERT INTO telefone VALUES(?,?,?)";
            $inserir = $conexao->prepare($sql);
            $inserir->bindValue(1,$cpf);
            $inserir->bindValue(2,$telefoneF);
            $inserir->bindValue(3,$telefoneC);
            $inserir->execute();

            //inserindo dados na tabela aluga
            $sql="INSERT INTO aluga VALUES(?,?)";
            $inserir = $conexao->prepare($sql);
            $inserir->bindValue(1,$numero);
            $inserir->bindValue(2,$cpf);
            $inserir->execute();

            echo "<script>alert('usuário cadastrado!');location.href=\"paginaPrincipal.php\";</script>";
        }*/

}
?>