<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    if (isset($_GET['operadora'])){

        $operadora  = $_GET['operadora'];
        $produto    = $_GET['produto'];
 
        $sql = "SELECT 
                    coalesce(p.valor, 0) as valor
                from produto p
                    where p.idoperadora = $operadora
                    and p.id = $produto";

        $result     = pg_query($sql);
        $produtos = pg_fetch_assoc($result);

        $json = json_encode($produtos);
        
        echo $json;
    }
    
?>    
     