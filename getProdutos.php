<?php
error_reporting(0);
// header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/funcoes.php');?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php

    if (isset($_GET['operadora'])){


        $operadora = $_GET['operadora'];
 
        $sql = "SELECT distinct
            o.id as idoperadora,
            o.operadora,
            p.id,
            retira_acentuacao(p.descricao) as descricao,
            p2.id as idplano,
            retira_acentuacao(p2.descricao) as plano,
            v.id as idversao,
            retira_acentuacao(v.descricao) as versao,
            (select count(*) from contatos c where c.idproduto = p.id) as vendas,
            v3.idcontato,
            c3.datahora,
            v2.idvendedor,
            retira_acentuacao(v2.vendedor) as vendedor,
            coalesce(p.valor, 0) as valor
            from produto p
            inner join plano p2 on p.planoid = p2.id
            inner join versaoplano v on p.versaoid = v.id
            inner join operadora o on o.id = p.idoperadora

            left join (select max(idcontato) as idcontato, c2.idproduto from contatos c2 group by 2) as v3 on v3.idproduto = p.id
            left join contatos c3 on v3.idcontato = c3.idcontato
            left join vendedores v2 on v2.idvendedor = c3.idvendedor

            where p.descricao is not null
            and o.id = $operadora

            order by p.id";

        $result     = pg_query($sql);
        $produtos = pg_fetch_all($result);

        $json = json_encode($produtos);
        
        echo $json;
    }
    
?>    
     