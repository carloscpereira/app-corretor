<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    if ($_GET != null){
        $proposta   = $_GET['proposta'];

    
        $sql = "SELECT
        cr.idcontato,
        cr.nome,
        cr.email,
        cr.telefone,
        md5(substring(cr.nome FROM 1 for 1) || cast(cr.idcontato AS VARCHAR)) as codex
        FROM contatos_rf cr
        WHERE cr.idcontato = $proposta
        ";
        
        $result = pg_query($sql);
        $data   = pg_fetch_assoc($result);
        
        $json   = json_encode($data);
        echo $json;
    }

?>    
     