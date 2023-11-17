<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); 
?>
<?php include('../funcoes/funcoes.php'); ?>
<?php include('../funcoes/corretor/conexao.php'); ?>

<?php


$idsupervisor   = $_COOKIE['idvendedor'];

$sql = "WITH RECURSIVE arvore_vendedores (value) AS
    (SELECT idvendedor as value, retira_acentuacao(vendedor) as text 
    FROM vendedores WHERE idsupervisor =$idsupervisor 
    
    UNION 
    SELECT vendedores.idvendedor as value, retira_acentuacao(vendedores.vendedor) as text
    FROM vendedores 
    INNER JOIN arvore_vendedores ON vendedores.idsupervisor = arvore_vendedores.value) 
    
    select * from arvore_vendedores 
    union select idvendedor, vendedor 
    from vendedores where idvendedor = $idsupervisor";

$result     = pg_query($sql);
$corretores = pg_fetch_all($result);

$json = json_encode($corretores);
echo $json;



?>