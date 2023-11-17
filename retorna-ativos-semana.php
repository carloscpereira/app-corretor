<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

if ($_GET != null){

    $idsupervisor   = $_GET['idsupervisor'];
    $data            = $_GET['data'];
 
    $sql = "
    WITH RECURSIVE arvore_vendedores (id) AS
    (
        SELECT
            idvendedor
        FROM vendedores
        WHERE idsupervisor =11

        UNION ALL

        SELECT
            vendedores.idvendedor
        FROM vendedores
        INNER JOIN arvore_vendedores ON vendedores.idsupervisor = arvore_vendedores.id
    )

    SELECT
	extract(dow from dtanalista) as dia,
    (sum(c.valortotal)+sum(coalesce(d.valor,0))) as valor,
    count(c.*) as propostas

    FROM contatos c
    LEFT JOIN dependentes d on d.titularid = c.idcontato
    INNER JOIN vendedores v on v.idvendedor = c.idvendedor

    WHERE (v.idvendedor in (select * from arvore_vendedores)
    or v.idvendedor = 11)
      and dtanalista between
          (cast('$data' as date) - cast( extract(dow from cast('$data' as date)) as integer))
          and
          cast('$data' as date) + cast(6 - extract(dow from cast('$data' as date)) as integer)
    and c.idstatus = 5

group by 1
order by 1
    ";
    

    $result     = pg_query($sql);
    $vendas     = pg_fetch_all($result);
    
    $json = json_encode($vendas);
    echo $json;
    
}
    
?> 