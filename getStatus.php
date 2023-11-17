<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

 
    $sql = "SELECT id AS value, retira_acentuacao(status) as text FROM status
            UNION
            SELECT 0, 'Propostas Pendentes'
    ";
    
    $result     = pg_query($sql);
    $status = pg_fetch_all($result);
    
    $json = json_encode($status);
    echo $json;


    
?>    
     