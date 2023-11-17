<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf8'); ?>
<?php include('../funcoes/corretor/conexao.php');?>

<?php


if ($_POST != null){
    $idsupervisor   = $_POST['idsupervisor'];
    $dtinicio       = $_POST['dtinicio'];
    $dtfim          = $_POST['dtfim'];
 
    $sql = "WITH RECURSIVE arvore_vendedores (id) AS
                    (
                        SELECT
                            idvendedor
                        FROM vendedores
                        WHERE idsupervisor =$idsupervisor

                        UNION ALL

                        SELECT
                            vendedores.idvendedor
                        FROM vendedores
                        INNER JOIN arvore_vendedores ON vendedores.idsupervisor = arvore_vendedores.id
                    )

                    SELECT
                        v.idvendedor,
                        retira_acentuacao(v.vendedor) as vendedor,
                        c.idcontato,
                        retira_acentuacao(c.nome) as titular,
                        retira_acentuacao(r.nome) as responsavel,
                        c.idconvenio,
                        retira_acentuacao(cv.descricao) as convenio,
                        c.datahora as dtcadastro,
                        cast(c.dtanalista as date) as dtativacao,
                        c.idformadepagamento,
                        retira_acentuacao(f.formadepagamento) as formadepagamento,
                        c.idproduto,
                        retira_acentuacao(p.descricao) as produto,

                        count(d.dependenteid) + 1 as quantidade,
                        sum(c.valortotal) + sum(coalesce(d.valor,0)) as valor
                    FROM contatos c
                    LEFT JOIN dependentes d on d.titularid = c.idcontato
                    INNER JOIN contatos_rf r on r.idcontato = c.idcontato
                    INNER JOIN vendedores v on v.idvendedor = c.idvendedor
                    INNER JOIN enderecos e on e.idcontato = c.idcontato
                    INNER JOIN municipio m on m.municipio_codigo = e.cidade
                    INNER JOIN status s on c.idstatus = s.id
                    LEFT JOIN convenios cv on cv.id = c.idconvenio
                    INNER JOIN formasdepagamento f on c.idformadepagamento = f.id
                    LEFT JOIN produto p on c.idproduto = p.id

                    WHERE (v.idvendedor in (select * from arvore_vendedores)
                    or v.idvendedor = $idsupervisor)
                    and c.idstatus in (5,14)
                    
                    --and c.dtanalista between '$dtinicio' and '$dtfim'
                    and c.datahora between '$dtinicio' and '$dtfim'

                group by 1,2,3,4,5,6,7,8,9,10,11,12,13
                order by 2,9";
    
    $result     = pg_query($sql);
    $vendas     = pg_fetch_all($result);
    
    $json = json_encode($vendas);
    echo $json;

}
    
?>    
     