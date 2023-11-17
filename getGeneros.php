<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    $sql = "SELECT
                generoid as id,
                genero as descricao
            FROM genero";

    $result = pg_query($sql);
    $dados  = pg_fetch_all($result);

    $json   = json_encode($dados);

    echo $json;
        
?>    
     