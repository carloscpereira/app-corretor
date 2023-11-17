<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    $idbeneficiario = isset($_GET['id'])?$_GET['id']:null;
    $idproposta     = isset($_GET['idcontato'])?$_GET['idcontato']:null;
    $nome           = isset($_GET['nome'])?$_GET['nome']:null;
    $vinculo        = isset($_GET['vinculo'])?$_GET['vinculo']:null;
    $genero         = isset($_GET['genero'])?$_GET['genero']:null;
    $nascimento     = isset($_GET['nascimento'])?$_GET['nascimento']:null;
    $cpf            = isset($_GET['cpf'])?preg_replace('/[^A-Za-z0-9]/', '', $_GET['cpf']):null;
    $rg             = isset($_GET['rg'])?$_GET['rg']:null;
    $orgao          = isset($_GET['orgao'])?$_GET['orgao']:null;
    $mae            = isset($_GET['mae'])?$_GET['mae']:null;
    $idproduto      = isset($_GET['idproduto'])?$_GET['idproduto']:null;
    $produto        = isset($_GET['produto'])?$_GET['produto']:null;
    $valor          = isset($_GET['valor'])?$_GET['valor']:null;

    if ($idbeneficiario==null){
        $sql = "INSERT INTO dependentes (
                titularid, 
                nome,
                nascimento, 
                cpf, 
                rg, 
                orgaoemissor, 
                valor, 
                nomedamae, 
                idgenero, 
                idproduto, 
                idvinculo) VALUES (
                $idproposta,
                '$nome',
                '$nascimento',
                '$cpf',
                '$rg',
                '$orgao',
                $valor,
                '$mae',
                $genero,
                $idproduto,
                $vinculo) RETURNING dependenteid as id, titularid as idproposta, nome, nascimento, 
                                    cpf, rg, orgaoemissor, valor, nomedamae, idgenero, idproduto, 
                                    idvinculo";
    } else {
        $sql = "UPDATE dependentes SET 
                nome = '$nome',
                nascimento = '$nascimento',
                cpf = '$cpf',
                rg = '$rg',
                orgaoemissor = '$orgao',
                valor = $valor,
                nomedamae = '$mae',
                idgenero = $genero,
                idproduto = $idproduto,
                idvinculo = $vinculo
             WHERE dependenteid =  $idbeneficiario 
             RETURNING dependenteid as id, titularid as idproposta, nome, nascimento, 
                                       cpf, rg, orgaoemissor, valor, nomedamae, idgenero, 
                                       idproduto, idvinculo";

    }
        $result = pg_query($sql);
        $data   = pg_fetch_assoc($result);
        $json   = json_encode($data);
        
        echo $json;
    
    
    
?> 