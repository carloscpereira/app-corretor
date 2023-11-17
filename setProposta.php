<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    $idcontato          = isset($_GET['idcontato'])?$_GET['idcontato']:null;
    $idvendedor         = isset($_GET['idvendedor'])?$_GET['idvendedor']:null;
    $idformadepagamento = isset($_GET['idformadepagamento'])?$_GET['idformadepagamento']:null;
    $idtipodeplano      = isset($_GET['idtipodeplano'])?$_GET['idtipodeplano']:null;
    $idtpcontrato       = isset($_GET['idtpcontrato'])?$_GET['idtpcontrato']:null;
    $idoperadora        = isset($_GET['idoperadora'])?$_GET['idoperadora']:null;
    $idcentrodecusto    = isset($_GET['idcentrodecusto'])?$_GET['idcentrodecusto']:null;
    $pdigital           = isset($_GET['pdigital'])?$_GET['pdigital']:null;
    $vencimento         = isset($_GET['vencimento'])?$_GET['vencimento']:null;
    $idproduto          = isset($_GET['idproduto'])?$_GET['idproduto']:null;


    if ($idcontato==null){

        $sql = "INSERT INTO contatos 
                (idvendedor,
                idformadepagamento,
                idtipodeplano,
                idtipodeproposta,
                idstatus,
                idoperadora,
                idcentrodecusto,
                proposta_digital,
                vencimento,
                datahora) VALUES (
                $idvendedor,
                $idformadepagamento,
                $idtipodeplano,
                $idtpcontrato,
                1,
                $idoperadora,
                $idcentrodecusto,
                $pdigital,
                $vencimento,
                CURRENT_TIMESTAMP
                ) RETURNING idcontato, idvendedor, idformadepagamento, idtipodeplano, idtipodeproposta, 
                            idstatus, idoperadora, idcentrodecusto, proposta_digital, vencimento, datahora";

    } else {
        $sql = "UPDATE contatos SET
                idvendedor = $idvendedor,
                idformadepagamento = $idformadepagamento,
                idtipodeplano = $idtipodeplano,
                idoperadora = $idoperadora,
                idcentrodecusto = $idcentrodecusto,
                proposta_digital = $pdigital,
                vencimento = '$vencimento'
                WHERE idcontato = $idcontato
                RETURNING idcontato, idvendedor, idformadepagamento, idtipodeplano, idtipodeproposta, 
                                                    idstatus, idoperadora, idcentrodecusto, proposta_digital, vencimento";

    }

        $result     = pg_query($sql);
        $data       = pg_fetch_assoc($result);

        $json = json_encode($data);
        
        echo $json;
    
    
?> 